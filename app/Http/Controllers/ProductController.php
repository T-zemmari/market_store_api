<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilters;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ProductFilters();
        $queryItems = $filter->useTransform($request);

        // Inicializamos la consulta
        $productsQuery = Product::query();

        // Aplicamos las condiciones de filtro a la consulta
        foreach ($queryItems as $queryItem) {
            $column = $queryItem[0]; // Nombre de la columna
            $operator = $queryItem[1]; // Operador
            $value = $queryItem[2]; // Valor

            // Aplicamos la condición a la consulta
            $productsQuery->where($column, $operator, $value);
        }

        // Obténemos la cantidad total de los productos que coinciden con los filtros
        $totalProducts = $productsQuery->count();

        // Si hay más de 10 productos, paginamos; de lo contrario, obtenenemos todos los productos
        $products = $totalProducts > 10 ? $productsQuery->paginate() : $productsQuery->get();

        // Devuelvemos la colección de productos
        return new ProductCollection($products);
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
    public function store(StoreProductRequest $request)
    {
        // Verificar si el SKU es único
        if ($request->sku && !$this->skuUnique($request->sku, null)) {
            return response()->json(['message' => 'The SKU is already in use by another product.'], 422);
        }
    
        // Crear el nuevo producto
        $newProduct = Product::create($request->all());
    
        return new ProductResource($newProduct);
    }

    /**
     * Display the specified resource.
     */
    public function show($productId)
    {
        try {
            $product = Product::findOrFail($productId);
            return new ProductResource($product);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $productId)
    {
        try {
            $product = Product::findOrFail($productId);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        // Verificar si el SKU es único, excluyendo el producto actual
        // if ($request->sku && !$this->skuUnique($request->sku, $productId)) {
        //     return response()->json(['message' => 'The SKU is already in use by another product.'], 422);
        // }
    
        // Excluir el campo SKU del array de datos para asegurar que no se modifique
        $requestData = $request->except('sku');
    
        // Actualizar el producto
        $product->update($requestData);
    
        return new ProductResource($product);
    }

    private function skuUnique($sku, $productId)
    {
        return !Product::where('sku', $sku)
            ->where('id', '!=', $productId)
            ->exists();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($productId)
    {
        $product = Product::find($productId);

        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
