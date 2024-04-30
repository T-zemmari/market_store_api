<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuilkStoreImageRequest;
use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Http\Resources\ImageCollection;
use App\Http\Resources\ImageResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['images']) && in_array('read', $token->abilities['images']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                $images = Image::all();
                return new ImageCollection($images);
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

    public function store(StoreImageRequest $request)
    {
        // Verificar si el usuario está autenticado
        $user = Auth::user();
        if ($user) {
            // Verificar si el usuario tiene permisos para crear imágenes
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['images']) && in_array('create', $token->abilities['images']);
            });
            if (!$hasAccess) {
                // Si el usuario no tiene permisos, devolver respuesta de error
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                // Procesar la solicitud y crear la imagen
                $path = 'upload/imgs/';
                $url_image = $request->url_image;
                if ($request->hasFile('url_image')) {
                    $file = $request->file('url_image');
                    $extention = $file->getClientOriginalExtension();
                    $filename = 'img_pr_' . time() . '.' . $extention;
                    $file->move($path, $filename);
                    $url_image = $path . $filename;
                }

                $imageData = [
                    'product_id' => $request->product_id,
                    'url_image' => $url_image,
                    'active' => $request->active,
                ];

                // Crear una nueva imagen con los datos proporcionados
                $newImage = Image::create($imageData);

                // Devolver la nueva imagen creada como respuesta
                return new ImageResource($newImage);
            }
        } else {
            // Si el usuario no está autenticado, devolver respuesta de no autenticado
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }


    public function bulkStore(BuilkStoreImageRequest $request)
    {

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['images']) && in_array('create', $token->abilities['images']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                try {
                    $bulk = collect($request->all())->map(function ($arr, $key) {
                        return Arr::except($arr, ['created_at', 'updated_at']);
                    });

                    Image::insert($bulk->toArray());
                    // Retornar una respuesta con código 200 y el mensaje adecuado
                    return response()->json(['code' => 200, 'message' => 'The images are stored correctly'], 200);
                } catch (\Exception $e) {
                    // Si ocurre un error, devolver una respuesta con código 500 y un mensaje de error
                    return response()->json(['code' => 500, 'message' => 'Internal Server Error: ' . $e->getMessage()], 500);
                }
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($image_id)
    {

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['images']) && in_array('read', $token->abilities['images']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                try {
                    $image = Image::findOrFail($image_id);
                    return new ImageResource($image);
                } catch (ModelNotFoundException $exception) {
                    return response()->json(['message' => 'Image not found'], 404);
                }
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, $image_id)
    {

        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['images']) && in_array('update', $token->abilities['images']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                try {
                    $image = Image::findOrFail($image_id);
                    $image->update($request->all());
                    return new ImageResource($image);
                } catch (ModelNotFoundException $exception) {
                    return response()->json(['message' => 'Image not found'], 404);
                }
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($image_id)
    {
        $user = Auth::user();
        if ($user) {
            $tokens = $user->tokens;
            $hasAccess = $tokens->contains(function ($token) {
                return isset($token->abilities['images']) && in_array('delete', $token->abilities['images']);
            });
            if (!$hasAccess) {
                return response()->json(['error' => 'You are not authorized for this operation'], 403);
            } else {
                $image = Image::find($image_id);
                if ($image) {
                    $image->delete();
                    return response()->json(['message' => 'Image deleted successfully'], 200);
                } else {
                    return response()->json(['message' => 'Image not found'], 404);
                }
            }
        } else {
            return response()->json(['code' => 403, 'unauthenticated']);
        }
    }
}
