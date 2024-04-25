<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data_products = [];
        foreach ($this->products as $product) {
            $data_products[] = $product->toArray(); // Devuelve todos los campos del producto
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'parent' => $this->parent,
            'description' => $this->description,
            'shortDescription' => $this->short_description,
            'display' => $this->display,
            'image' => $this->image,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'products' => $data_products,
        ];
    }
}
