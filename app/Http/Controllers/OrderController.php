<?php

namespace App\Http\Controllers;

use App\Filters\OrderFilters;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderCollection;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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

        $orders->transform(function ($order) {
            $order->line_items = json_decode($order->line_items);
            return $order;
        });

        $orders->transform(function ($order) {
            $order->coupon_lines = json_decode($order->coupon_lines);
            return $order;
        });

        // Devuelvemos la colección de pedidos
        return new OrderCollection($orders);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
