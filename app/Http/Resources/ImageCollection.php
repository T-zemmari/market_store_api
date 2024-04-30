<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ImageCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($image) {
            return [
                'id' => $image->id,
                'url_image' => $image->url_image,
                'active' => $image->active,
                'created_at' => $image->created_at,
                'updated_at' => $image->updated_at,
            ];
        })->all();
    }
}
