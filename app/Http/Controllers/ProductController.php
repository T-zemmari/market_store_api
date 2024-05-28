<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilters;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
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
                return isset($token->abilities['products']) && in_array('read', $token->abilities['products']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized to view this information'], 403);
            } else {
                $filter = new ProductFilters();
                $queryItems = $filter->useTransform($request);

                // Inicializamos la consulta
                $productsQuery = Product::query();

                // Aplicamos las condiciones de filtro a la consulta
                foreach ($queryItems as $queryItem) {
                    $column = $queryItem[0]; // Nombre de la columna
                    $operator = $queryItem[1]; // Operador
                    $value = $queryItem[2]; // Valor

                    // Añadimos las condiciones de filtro a la consulta
                    if ($operator == 'LIKE') {
                        // Para operadores LIKE, usamos '%' para la comparación
                        $productsQuery->whereRaw("$column $operator ?", ["$value%"]);
                    } else {
                        $productsQuery->where($column, $operator, $value);
                    }
                }

                // Obténemos la cantidad total de los productos que coinciden con los filtros
                $totalProducts = $productsQuery->count();

                // Si hay más de 50 productos, paginamos; de lo contrario, obtenenemos todos los productos
                $products = $totalProducts > 50 ? $productsQuery->paginate(50) : $productsQuery->get();

                // Devuelvemos la colección de productos
                return new ProductCollection($products);
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
    public function store(StoreProductRequest $request)
    {

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['products']) && in_array('create', $token->abilities['products']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                // Verificar si el SKU es único
                if ($request->sku && !$this->skuUnique($request->sku, null)) {
                    return response()->json(['message' => 'The SKU is already in use by another product.'], 422);
                }

                $path = 'upload/imgs/';
                $url_image_p = null;
                if ($request->hasFile('principalImage')) {
                    $file_image = $request->file('principalImage');
                    $extention_img = $file_image->getClientOriginalExtension();
                    $filename_img = 'img_p_' . time() . '.' . $extention_img;
                    $file_image->move($path, $filename_img);
                    $url_image_p = $path . $filename_img;
                }


                $newProductData = $request->all();
                if (is_string($url_image_p)) {
                    $newProductData['image'] = $url_image_p;
                }

                try {

                    $newProduct = Product::create($newProductData);

                    //$newProduct = Product::find(1);

                    // Procesar y almacenar imágenes si se enviaron
                    //dd($request->file('images'));

                    if ($request->hasFile('images')) {
                        //dump($request->file('images'));

                        foreach ($request->file('images') as $image) {
                            // Procesar cada imagen individualmente

                            $extention = $image->getClientOriginalExtension(); // Obtener el nombre original del archivo
                            $filename = 'img_n_' . time() . '.' . $extention;

                            $image->move($path, $filename); // Mover el archivo al directorio de destino

                            $url_image = $path . $filename; // Obtener la URL de la imagen
                            $imageData = [
                                'product_id' => $newProduct->id,
                                'url_image' => $url_image,
                                'active' => 1,
                            ];
                            // Crear una nueva imagen con los datos proporcionados
                            Image::create($imageData);
                        }
                    }
                    return new ProductResource($newProduct);
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
    public function show($productId)
    {

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['products']) && in_array('read', $token->abilities['products']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized to view this information'], 403);
            } else {

                try {
                    $product = Product::findOrFail($productId);
                    return new ProductResource($product);
                } catch (ModelNotFoundException $exception) {
                    return response()->json(['message' => 'Product not found'], 404);
                }
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
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

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['products']) && in_array('update', $token->abilities['products']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                try {
                    $product = Product::findOrFail($productId);
                } catch (ModelNotFoundException $exception) {
                    return response()->json(['message' => 'Product not found'], 404);
                }

                // Verificar si el SKU es único, excluyendo el producto actual
                if ($request->sku && !$this->skuUnique($request->sku, $productId)) {
                    return response()->json(['message' => 'The SKU is already in use by another product.'], 422);
                }

                // Excluir el campo SKU del array de datos para asegurar que no se modifique
                $requestData = $request->except('sku');

                //dump($requestData);die;


                $path = 'upload/imgs/';
                $url_image_p = null;
                if ($request->hasFile('principalImage')) {
                    $file_image = $request->file('principalImage');
                    $extention_img = $file_image->getClientOriginalExtension();
                    $filename_img = 'img_p_' . time() . '.' . $extention_img;
                    $file_image->move($path, $filename_img);
                    $url_image_p = $path . $filename_img;
                }

                if (is_string($url_image_p)) {
                    $requestData['image'] = $url_image_p;
                }

                if ($request->hasFile('images')) {
                    //dump($request->file('images'));

                    $product->images()->detash();

                    foreach ($request->file('images') as $image) {
                        // Procesar cada imagen individualmente

                        $extention = $image->getClientOriginalExtension(); // Obtener el nombre original del archivo
                        $filename = 'img_n_' . time() . '.' . $extention;

                        $image->move($path, $filename); // Mover el archivo al directorio de destino

                        $url_image = $path . $filename; // Obtener la URL de la imagen
                        $imageData = [
                            'product_id' => $product->id,
                            'url_image' => $url_image,
                            'active' => 1,
                        ];
                        // Crear una nueva imagen con los datos proporcionados
                        Image::create($imageData);
                    }
                }

                try {
                    // Actualizar el producto
                    $product->update($requestData);
                    return new ProductResource($product);
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

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['products']) && in_array('delete', $token->abilities['products']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                $product = Product::find($productId);

                if ($product) {
                    $product->delete();
                    return response()->json(['message' => 'Product deleted successfully'], 200);
                } else {
                    return response()->json(['message' => 'Product not found'], 404);
                }
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }
}
