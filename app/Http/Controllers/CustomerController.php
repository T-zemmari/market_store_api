<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerCollection;
use App\Filters\CustomerFilters;
use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new CustomerFilters();
        $queryItems = $filter->useTransform($request);

        // Inicializamos la consulta con todos los clientes
        $customersQuery = Customer::query();

        // Aplicamos las condiciones de filtro a la consulta
        foreach ($queryItems as $queryItem) {
            $column = $queryItem[0]; // Nombre de la columna
            $operator = $queryItem[1]; // Operador
            $value = $queryItem[2]; // Valor

            // Aplicamos la condición a la consulta
            $customersQuery->where($column, $operator, $value);
        }

        // Obténemos la cantidad total de clientes que coinciden con los filtros
        $totalCustomers = $customersQuery->count();

        // Si hay más de 15 clientes, paginamos; de lo contrario, obtenenemos todos los clientes
        $customers = $totalCustomers > 15 ? $customersQuery->paginate() : $customersQuery->get();

        // Devuelvemos la colección de clientes
        return new CustomerCollection($customers);
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

        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
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
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $response = [
            'code' => '500',
            'message' => 'error',
        ];
        $custome_data = $request->except('email');
        if ($customer->update($custome_data)) {

            $data = [
                "firstName" => $customer->first_name,
                "lastName" => $customer->last_name,
                "customerType" => $customer->customer_type,
                "email" => $customer->email,
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
                'code' => '200',
                'message' => 'Custumer updated correcty',
                'data' => $data
            ];
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
