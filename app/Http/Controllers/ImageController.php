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

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();
        return new ImageCollection($images);
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
        // Crear una nueva imagen
        $newImage = Image::create($request->all());
        return new ImageResource($newImage);
    }



    public function bulkStore(BuilkStoreImageRequest $request)
    {
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

    /**
     * Display the specified resource.
     */
    public function show($image_id)
    {
        try {
            $image = Image::findOrFail($image_id);
            return new ImageResource($image);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Image not found'], 404);
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
        try {
            $image = Image::findOrFail($image_id);
            $image->update($request->all());
            return new ImageResource($image);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Image not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($image_id)
    {
        $image = Image::find($image_id);
        if ($image) {
            $image->delete();
            return response()->json(['message' => 'Image deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Image not found'], 404);
        }
    }
}
