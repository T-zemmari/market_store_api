<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Http\Requests\StoreCustomerModelRequest;
use App\Http\Requests\UpdateCustomerModelRequest;

class CustomerModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCustomerModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerModel $customerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerModel $customerModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerModelRequest $request, CustomerModel $customerModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerModel $customerModel)
    {
        //
    }
}
