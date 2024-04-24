<?php

namespace App\Http\Controllers;

use App\Filters\CategoryFilters;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryCollection;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new CategoryFilters();
        $queryItems = $filter->useTransform($request);

        // Inicializamos la consulta
        $catgoriesQuery = Category::query();

        // Aplicamos las condiciones de filtro a la consulta
        foreach ($queryItems as $queryItem) {
            $column = $queryItem[0]; // Nombre de la columna
            $operator = $queryItem[1]; // Operador
            $value = $queryItem[2]; // Valor

            // Aplicamos la condición a la consulta
            $catgoriesQuery->where($column, $operator, $value);
        }

        // Obténemos la cantidad total de categorias que coinciden con los filtros
        $totalCategories = $catgoriesQuery->count();

        // Si hay más de 10 categorias, paginamos; de lo contrario, obtenenemos todas las categorias
        $categories = $totalCategories > 10 ? $catgoriesQuery->paginate() : $catgoriesQuery->get();

        // Devuelvemos la colección de categorias
        return new CategoryCollection($categories);
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
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
