<?php

namespace App\Http\Controllers;

use App\Filters\OrderFilters;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['orders']) && in_array('read', $token->abilities['orders']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {

                $filter = new OrderFilters();
                $queryItems = $filter->useTransform($request);

                // Inicializamos la consulta
                $ordersQuery = Order::query();

                // Aplicamos las condiciones de filtro a la consulta
                foreach ($queryItems as $queryItem) {
                    $column = $queryItem[0]; // Nombre de la columna
                    $operator = $queryItem[1]; // Operador
                    $value = $queryItem[2]; // Valor

                    // Aplicamos la condición a la consulta
                    $ordersQuery->where($column, $operator, $value);
                }

                // Obténemos la cantidad total de los pedidos que coinciden con los filtros
                $totalOrders = $ordersQuery->count();

                // Si hay más de 10 pedidos, paginamos; de lo contrario, obtenenemos todos los pedidos
                $orders = $totalOrders > 10 ? $ordersQuery->paginate() : $ordersQuery->get();

                // Devuelvemos la colección de pedidos
                return new OrderCollection($orders);
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['orders']) && in_array('create', $token->abilities['orders']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                // Verificar si hay productos en el pedido
                if (!$request->has('lineItems') || empty($request->lineItems)) {
                    return response()->json(['error' => 'No products found in the order'], 400);
                }

                // Calcular el shippingTotal (total de productos sin IVA)
                $shippingTotalwithTax = 0;
                foreach ($request->lineItems as $item) {
                    $shippingTotalwithTax += $item['price'] * $item['quantity'];
                }

                // Calcular el shippingTotalwithTax
                $shippingTotalwithTax = round($shippingTotalwithTax, 2) - (round($request->discountTotal, 2));
                // Calcular el totalTax (suma de los IVAs de los productos)
                $totalTax = round($shippingTotalwithTax - ($shippingTotalwithTax / 1.21), 2);
                // Calcular el shippingTotal (total sin iva 21%)

                $shippingTotal = round($shippingTotalwithTax - $totalTax, 2);

                // Verificar si los cálculos coinciden con los valores enviados en el cuerpo de la solicitud
                if (
                    !is_numeric($request->shippingTotal) ||
                    !is_numeric($request->totalTax) ||
                    !is_numeric($request->shippingTotalwithTax) ||
                    $request->shippingTotal <= 0 ||
                    $request->totalTax <= 0 ||
                    $request->shippingTotalwithTax <= 0 ||
                    $request->shippingTotal != $shippingTotal ||
                    $request->totalTax != $totalTax ||
                    $request->shippingTotalwithTax != $shippingTotalwithTax
                ) {
                    return response()->json(['error' => 'Invalid order data,unable to recalculate order data'], 400);
                }


                // Crear el nuevo pedido
                $newOrderData = $request->validated();

                // Convertir campos de array a JSON
                $newOrderData['billing'] = json_encode($request->billing);
                $newOrderData['shipping'] = json_encode($request->shipping);
                $newOrderData['line_items'] = json_encode($request->line_items);
                $newOrderData['coupon_lines'] = json_encode($request->coupon_lines);

                $newOrder = Order::create($newOrderData);

                return response()->json([
                    'message' => 'Order created successfully',
                    'order' => new OrderResource($newOrder)
                ], 201);
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($order_id)
    {

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['orders']) && in_array('read', $token->abilities['orders']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                try {
                    $product = Order::findOrFail($order_id);
                    return new OrderResource($product);
                } catch (ModelNotFoundException $exception) {
                    return response()->json(['message' => 'Product not found'], 404);
                }
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    private function cancelOrder($order_id)
    {

        $order = Order::find($order_id);
        if (!$order) {
            return response()->json(['code' => 404, 'message' => 'Order not found'], 404);
        } else {
            $order->status = 'cancelled';
            if ($order->save()) {
                return response()->json(['code' => 200, 'message' => 'Order canceled correctly'], 200);
            } else {
                return response()->json(['code' => 500, 'message' => 'Order not canceled'], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($order_id)
    {
        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['orders']) && in_array('delete', $token->abilities['orders']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                return $this->cancelOrder($order_id);
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }
}
