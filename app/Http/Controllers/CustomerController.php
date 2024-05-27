<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerCollection;
use App\Filters\CustomerFilters;
use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user) {

            $tokens = $user->tokens;
            // Verificamos si el usuario tiene al menos un token con la habilidad "read"
            $hasReadAbility = $tokens->contains(function ($token) {
                return isset($token->abilities['customers']) && in_array('read', $token->abilities['customers']);
            });

            if ($hasReadAbility) {
                $filter = new CustomerFilters();
                $queryItems = $filter->useTransform($request);

                // Inicializamos la consulta con todos los clientes
                $customersQuery = Customer::where('status', 'active');


                foreach ($queryItems as $queryItem) {
                    $column = $queryItem[0]; // Nombre de la columna
                    $operator = $queryItem[1]; // Operador
                    $value = $queryItem[2]; // Valor

                    // Añadimos las condiciones de filtro a la consulta
                    if ($operator == 'LIKE') {
                        // Para operadores LIKE, usamos '%' para la comparación
                        $customersQuery->whereRaw("$column $operator ?", ["$value%"]);
                    } else {
                        $customersQuery->where($column, $operator, $value);
                    }
                }

                // Mostrar la consulta SQL final después de aplicar todos los filtros
                // $sql = $customersQuery->toSql();
                // $bindings = $customersQuery->getBindings();

                // dump($sql);
                // dump($bindings);
                // dd($sql);

                // Obténemos la cantidad total de clientes que coinciden con los filtros
                $totalCustomers = $customersQuery->count();

                // Si hay más de 50 clientes, paginamos; de lo contrario, obtenemos todos los clientes
                $customers = $totalCustomers > 50 ? $customersQuery->paginate(50) : $customersQuery->get();

                // Devolvemos la colección de clientes
                return new CustomerCollection($customers);
            } else {
                return response()->json(['error' => 'You are not authorized'], 403);
            }
        } else {
            return Response()->json(['code' => 403, 'unauthenticated']);
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
    public function store(StoreCustomerRequest $request)
    {
        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['customers']) && in_array('create', $token->abilities['customers']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized'], 403);
            } else {
                try {
                    $customer = Customer::create($request->all());
                    return new CustomerResource($customer);
                } catch (ValidationException $e) {
                    return response()->json([
                        'code' => 422,
                        'errors' => $e->errors()
                    ], 422);
                }
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($customer_id)
    {

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['customers']) && in_array('read', $token->abilities['customers']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized'], 403);
            } else {
                $customer = Customer::find($customer_id);
                if (!isset($customer->id) || trim($customer->status) === 'deleted') {
                    $response['code'] = 404;
                    $response['message'] = 'Customer not found';
                    return response()->json($response, 404);
                }

                return new CustomerResource($customer);
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, $customer_id)
    {
        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['customers']) && in_array('delete', $token->abilities['customers']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized'], 403);
            } else {
                $response = [
                    'code' => 500,
                    'message' => 'error',
                ];
                $customer = Customer::find($customer_id);
                if (!isset($customer->id) || trim($customer->status) === 'deleted') {
                    $response = [
                        'code' => 404,
                        'message' => 'Customer not found',
                    ];
                } else {

                    try {
                        $custome_data = $request->except('email');
                        if ($customer->update($custome_data)) {

                            $data = [
                                "id" => $customer->id,
                                "firstName" => $customer->first_name,
                                "lastName" => $customer->last_name,
                                "customerType" => $customer->customer_type,
                                "email" => $customer->email,
                                "status" => $customer->status,
                                "adress" => $customer->adress,
                                "postalCode" => $customer->postal_code,
                                "city" => $customer->city,
                                "state" => $customer->state,
                                "country" => $customer->country,
                                "phone" => $customer->phone,
                                "isPayingCustomer" => $customer->is_paying_customer,
                                "updated_at" => $customer->updated_at
                            ];

                            $response = [
                                'code' => 200,
                                'message' => 'Custumer updated correcty',
                                'data' => $data
                            ];
                        }
                    } catch (ValidationException $e) {
                        return response()->json([
                            'code' => 422,
                            'errors' => $e->errors()
                        ], 422);
                    }
                }

                return $response;
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }

    /**
     * Soft remove the specified resource from storage.
     */

    public function softDestroy($customer)
    {
        if ($customer->status === 'deleted') {
            return response()->json(['message' => 'Customer already deleted'], 404);
        }
        $customer->update(['status' => 'deleted']);
        return response()->json(['message' => 'Customer status updated to deleted'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customer_id)
    {

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['customers']) && in_array('delete', $token->abilities['customers']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized'], 403);
            } else {
                $customer = Customer::find($customer_id);
                if (!isset($customer->id) || trim($customer->status) === 'deleted') {
                    $response['code'] = 404;
                    $response['message'] = 'Customer not found';
                    return response()->json($response, 404);
                }

                return $this->softDestroy($customer);
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }
}
