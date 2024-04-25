<?php

namespace App\Http\Controllers;

use App\Filters\CategoryFilters;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


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
        // Comprobar si ya existe una categoría con el mismo nombre y el mismo padre
        $existingCategory = Category::where('name', $request->name)
            ->where('parent', $request->parent)
            ->first();

        if ($existingCategory) {
            return response()->json(['message' => 'Category with the same name and parent already exists'], Response::HTTP_CONFLICT);
        }

        // Si no existe, crear la categoría
        $newCategory = Category::create($request->all());

        return new CategoryResource($newCategory);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
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
        $category_data = $request->all();

        if ($category->update($category_data)) {

            $data = [
                "name" => $category->name,
                "parent" => $category->parent,
                "description" => $category->description,
                "short_description" => $category->short_description,
                "image" => $category->image,
                "adress" => $category->adress,
                "postalCode" => $category->postal_code,
                "status" => $category->status,
                "discontinued" => $category->discontinued,
                "valid" => $category->valid,
            ];

            $response = [
                'code' => 200,
                'message' => 'Category updated correcty',
                'data' => $data
            ];
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Eliminar los productos asociados a esta categoría
        $category->products()->delete();
        // Ahora elimina la categoría
        $category->delete();

        return response()->json(['message' => 'Category and associated products deleted successfully'], 200);
    }
}
