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
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
                return isset($token->abilities['categories']) && in_array('read', $token->abilities['categories']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
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
    public function store(StoreCategoryRequest $request)
    {

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['categories']) && in_array('create', $token->abilities['categories']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
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
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($categoryId)
    {

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['categories']) && in_array('read', $token->abilities['categories']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                try {
                    $category = Category::findOrFail($categoryId);
                    $categoryResource = new CategoryResource($category);
                    return $categoryResource;
                } catch (ModelNotFoundException $exception) {
                    return response()->json(['message' => 'Category not found'], 404);
                }
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
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
    public function update(UpdateCategoryRequest $request, $categoryId)
    {

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['categories']) && in_array('update', $token->abilities['categories']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {

                try {
                    $category = Category::findOrFail($categoryId);
                } catch (ModelNotFoundException $exception) {
                    return response()->json(['message' => 'Category not found'], 404);
                }

                $category_data = $request->all();

                if ($category->update($category_data)) {
                    $data_products = [];
                    $products = $category->products;
                    if ($products) {
                        foreach ($products as $product) {
                            $data_products[] = $product->toArray(); // Devuelve todos los campos del producto
                        }
                    }

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
                        'products' => $data_products,
                    ];

                    $response = [
                        'code' => 200,
                        'message' => 'Category updated correctly',
                        'data' => $data
                    ];
                } else {
                    $response = [
                        'code' => 500,
                        'message' => 'Failed to update category'
                    ];
                }

                return response()->json($response);
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoryId)
    {

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['categories']) && in_array('delete', $token->abilities['categories']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                $category = Category::find($categoryId);
                if ($category) {
                    // Eliminar los productos asociados a esta categoría
                    $category->products()->delete();
                    $category->delete();
                    return response()->json(['message' => 'Category and associated products deleted successfully'], 200);
                } else {
                    return response()->json(['message' => 'Category not found'], 404);
                }
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }
}
