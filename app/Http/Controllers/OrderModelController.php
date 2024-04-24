<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Http\Requests\StoreOrderModelRequest;
use App\Http\Requests\UpdateOrderModelRequest;

class OrderModelController extends Controller
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
    public function store(StoreOrderModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderModel $orderModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderModel $orderModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderModelRequest $request, OrderModel $orderModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderModel $orderModel)
    {
        //
    }
}
