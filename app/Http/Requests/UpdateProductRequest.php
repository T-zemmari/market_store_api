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
                "categoryId" => ['required', 'numeric'],
                "sku" => ['sometimes', 'required', 'numeric', 'min:1000', 'max:9999999'],
                "ean" => ['sometimes','numeric'],
                "ean13" => ['sometimes','numeric','digits:13'],
                "type" => ['required', Rule::in(['simple', 'grouped', 'external', 'variable'])],
                "status" => ['required', Rule::in(['draft', 'pending', 'private', 'publish'])],
                "featured" => ['required', 'boolean'],
                "catalogVisibility" => ['required', Rule::in(['visible', 'catalog', 'search', 'hidden'])],
                "description" => ['string'],
                "shortDescription" => ['string'],
                "price" => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
                "regularPrice" => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
                "salePrice" => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
                "onSale" => ['required', 'boolean'],
                "stockQuantity" => ['required', 'numeric'],
                "stockStatus" => ['required', Rule::in(['instock', 'outofstock'])],
                "dimensions" => ['nullable', 'regex:/^\d{1,3}x\d{1,3}x\d{1,3}cm$/'],
                "weight" => ['nullable', 'string', 'regex:/^\d+(\.\d+)?kg$/'],
                "image" => ['nullable', 'string'],
                "discontinued" => ['required', 'boolean'],
                "valid" => ['required', 'boolean'],
                "principalImage" => ['nullable', 'mimes:png,jpg,jpeg,webp'],
                "images.*" => ['nullable', 'mimes:png,jpg,jpeg,webp']
            ];
        } else {
            return [
                "name" => ['sometimes', 'required', 'string'],
                "categoryId" => ['sometimes', 'required', 'numeric'],
                "sku" => ['sometimes', 'required', 'numeric', 'min:1000', 'max:9999999'],
                "ean" => ['sometimes','numeric'],
                "ean13" => ['sometimes','numeric','digits:13'],
                "type" => ['sometimes', 'required', Rule::in(['simple', 'grouped', 'external', 'variable'])],
                "status" => ['sometimes', 'required', Rule::in(['draft', 'pending', 'private', 'publish'])],
                "featured" => ['sometimes', 'required', 'boolean'],
                "catalogVisibility" => ['sometimes', 'required', Rule::in(['visible', 'catalog', 'search', 'hidden'])],
                "description" => ['sometimes', 'string'],
                "shortDescription" => ['sometimes', 'string'],
                "price" => ['sometimes', 'required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
                "regularPrice" => ['sometimes', 'required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
                "salePrice" => ['sometimes', 'required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
                "onSale" => ['sometimes', 'required', 'boolean'],
                "stockQuantity" => ['sometimes', 'required', 'numeric'],
                "stockStatus" => ['sometimes', 'required', Rule::in(['instock', 'outofstock'])],
                "dimensions" => ['sometimes', 'nullable', 'regex:/^\d{1,3}x\d{1,3}x\d{1,3}cm$/'],
                "weight" => ['sometimes', 'nullable', 'string', 'regex:/^\d+(\.\d+)?kg$/'],
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
