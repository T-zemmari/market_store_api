<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Http\Requests\StoreCategoryModelRequest;
use App\Http\Requests\UpdateCategoryModelRequest;

class CategoryModelController extends Controller
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
    public function store(StoreCategoryModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryModel $categoryModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryModel $categoryModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryModelRequest $request, CategoryModel $categoryModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryModel $categoryModel)
    {
        //
    }
}
