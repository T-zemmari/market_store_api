<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                "name" => ['required', 'string'],
                "category_id" => ['required', 'numeric'],
                "sku" => ['nullable', 'string', 'unique:products,sku', 'min:1000', 'max:9999999'],
                "ean" => ['nullable', 'string'],
                "ean13" => ['nullable', 'string', 'digits:13'],
                "type" => ['required', Rule::in(['simple', 'grouped', 'external', 'variable'])],
                "status" => ['required', Rule::in(['draft', 'pending', 'private', 'publish'])],
                "featured" => ['required', 'boolean'],
                "catalog_visibility" => ['required', Rule::in(['visible', 'catalog', 'search', 'hidden'])],
                "description" => ['nullable', 'string'],
                "short_description" => ['nullable', 'string'],
                "price" => ['required', 'numeric'],
                "regular_price" => ['required', 'numeric'],
                "sale_price" => ['required', 'numeric'],
                "on_sale" => ['nullable', 'boolean'],
                "stock_quantity" => ['required', 'numeric'],
                "stock_status" => ['required', Rule::in(['instock', 'outofstock'])],
                "dimensions" => ['nullable', 'string', 'regex:/^\d{1,3}x\d{1,3}x\d{1,3}cm$/'],
                "weight" => ['nullable', 'string'],
                "image" => ['nullable', 'string'],
                "discontinued" => ['required', 'boolean'],
                "valid" => ['required', 'boolean'],
                "principalImage" => ['nullable', 'mimes:png,jpg,jpeg,webp'],
                "images.*" => ['nullable', 'mimes:png,jpg,jpeg,webp']
            ];
        } else {
            return [
                "name" => ['sometimes', 'required', 'string'],
                "category_id" => ['sometimes', 'required', 'numeric'],
                "sku" => ['nullable', 'string', 'unique:products,sku', 'min:1000', 'max:9999999'],
                "ean" => ['nullable', 'string'],
                "ean13" => ['nullable', 'string', 'digits:13'],
                "type" => ['sometimes', 'required', Rule::in(['simple', 'grouped', 'external', 'variable'])],
                "status" => ['sometimes', 'required', Rule::in(['draft', 'pending', 'private', 'publish'])],
                "featured" => ['sometimes', 'required', 'boolean'],
                "catalog_visibility" => ['sometimes', 'required', Rule::in(['visible', 'catalog', 'search', 'hidden'])],
                "description" => ['sometimes', 'nullable', 'string'],
                "short_description" => ['sometimes', 'nullable', 'string'],
                "price" => ['sometimes', 'required', 'numeric'],
                "regular_price" => ['sometimes', 'required', 'numeric'],
                "sale_price" => ['sometimes', 'required', 'numeric'],
                "on_sale" => ['sometimes', 'boolean'],
                "stock_quantity" => ['sometimes', 'required', 'numeric'],
                "stock_status" => ['sometimes', 'required', Rule::in(['instock', 'outofstock'])],
                "dimensions" => ['sometimes', 'nullable', 'string', 'regex:/^\d{1,3}x\d{1,3}x\d{1,3}cm$/'],
                "weight" => ['sometimes', 'nullable', 'string'],
                "image" => ['sometimes', 'nullable', 'string'],
                "discontinued" => ['sometimes', 'required', 'boolean'],
                "valid" => ['sometimes', 'required', 'boolean'],
                "principalImage" => ['nullable', 'mimes:png,jpg,jpeg,webp'],
                "images.*" => ['nullable', 'mimes:png,jpg,jpeg,webp']
            ];
        }
    }

    protected function prepareForValidation()
    {
        //dump($this->request->all());die;
        if ($this->principalImage) {
            $this->merge(['principal_image' => $this->principalImage]);
        }
        if ($this->categoryId) {
            $this->merge(['category_id' => $this->categoryId]);
        }
        if ($this->catalogVisibility) {
            $this->merge(['catalog_visibility' => $this->catalogVisibility]);
        }
        if ($this->shortDescription) {
            $this->merge(['short_description' => $this->shortDescription]);
        }
        if ($this->regularPrice) {
            $this->merge(['regular_price' => $this->regularPrice]);
        }
        if ($this->onSale) {
            $this->merge(['on_sale' => $this->onSale]);
        }
        if ($this->salePrice) {
            $this->merge(['sale_price' => $this->salePrice]);
        }
        if ($this->stockQuantity) {
            $this->merge(['stock_quantity' => $this->stockQuantity]);
        }
        if ($this->stockStatus) {
            $this->merge(['stock_status' => $this->stockStatus]);
        }
    }
}
