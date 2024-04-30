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

        $request->validate([
            'product_id' => ['required', 'numeric'],
            'url_image' => ['nullable', 'mimes:png,jpg,jpeg,webp'],
            'active' => ['required', 'boolean'],
        ]);

        $path = 'upload/imgs/';
        $url_image = $this->url_image;
        if ($request->hasFile('url_image')) {
            $file = $request->file('url_image');
            $extention = $file->getClientOriginalExtension();
            $filename = 'img_pr_'.time() . '.' . $extention;
            $file->move($path, $filename);
            $url_image = $path . $filename;
        }

        return [
            'id' => $this->id,
            'url_image' => $this->url_image,
            'active' => $this->active,
            'url_image' => $url_image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //'product' => $product_info,
        ];
    }
}
