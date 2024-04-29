<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $product_info = Product::find($this->product_id);

        return [
            'id' => $this->id,
            'url_image' => $this->url_image,
            'active' => $this->active,
            'url_image' => $this->url_image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'product' => $product_info,
        ];
    }
}