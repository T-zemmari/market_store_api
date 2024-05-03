<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
        return [
            "name" => ['required', 'string'],
            "category_id" => ['required', 'numeric'],
            "sku" => ['required', 'numeric', 'min:1000', 'max:9999999'],
            "ean" => ['sometimes','nullable', 'numeric'],
            "ean13" => ['sometimes', 'nullable','numeric', 'min:13', 'max:13'],
            "type" => ['required', Rule::in(['simple', 'grouped', 'external', 'variable'])],
            "status" => ['required', Rule::in(['draft', 'pending', 'private', 'publish'])],
            "featured" => ['required', Rule::in([true, false, 0, 1])],
            "catalog_visibility" => ['required', Rule::in(['visible', 'catalog', 'search', 'hidden'])],
            "description" => ['string'],
            "short_description" => ['string'],
            "price" => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'], // Numeric con máximo dos decimales
            "regular_price" => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'], // Numeric con máximo dos decimales
            "sale_price" => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'], // Numeric con máximo dos decimales
            "on_sale" => ['required', Rule::in([true, false, 0, 1])],
            "stock_quantity" => ['required', 'numeric'],
            "stock_status" => ['required', Rule::in(['instock', 'outofstock'])],
            "dimensions" => ['nullable', 'regex:/^\d{1,3}x\d{1,3}x\d{1,3}cm$/'],
            "weight" => ['nullable', 'string', 'regex:/^\d+(\.\d+)?kg$/'],
            "image" => ['nullable', 'string'],
            "discontinued" => ['required', Rule::in([true, false, 0, 1])],
            "valid" => ['required', Rule::in([true, false, 0, 1])],
            "images.*" => ['nullable', 'mimes:png,jpg,jpeg,webp']
        ];
    }

    protected function prepareForValidation()
    {

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
