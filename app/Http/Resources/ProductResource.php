<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $images = $this->images->map(function ($image) {
            return [
                'id' => $image->id,
                'active' => $image->active,
                'url_image' => $image->url_image,
                'created_at' => $image->created_at,
                'updated_at' => $image->updated_at,               
            ];
        });

        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'sku' => $this->sku,
            'type' => $this->type,
            'status' => $this->status,
            'featured' => $this->featured,
            'catalog_visibility' => $this->catalog_visibility,
            'description' => $this->description,
            'short_description' => $this->short_description,
            'regular_price' => $this->regular_price,
            'sale_price' => $this->sale_price,
            'on_sale' => $this->on_sale,
            'stock_quantity' => $this->stock_quantity,
            'stock_status' => $this->stock_status,
            'weight' => $this->weight,
            'dimensions' => $this->dimensions,
            'meta_data' => $this->meta_data,
            'variation' => $this->variation,
            'images' => $images,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
