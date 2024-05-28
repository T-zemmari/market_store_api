<?php

namespace App\Http\Requests;

use App\Models\Product;
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
        //dd($this->request->all());die;

        if ($method == 'PUT') {
            return [
                "name" => ['required', 'string'],
                "categoryId" => ['required', 'numeric'],
                "sku" => ['nullable', 'string'],
                "ean" => ['nullable','string'],
                "ean13" => ['nullable','string'],
                "type" => ['required', Rule::in(['simple', 'grouped', 'external', 'variable'])],
                "status" => ['required', Rule::in(['draft', 'pending', 'private', 'publish'])],
                "featured" => ['required', Rule::in([true, false, 0, 1])],
                "catalogVisibility" => ['required', Rule::in(['visible', 'catalog', 'search', 'hidden'])],
                "description" => ['string'],
                "shortDescription" => ['string'],
                "price" => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'], // Numeric con máximo dos decimales
                "regularPrice" => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'], // Numeric con máximo dos decimales
                "salePrice" => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'], // Numeric con máximo dos decimales
                "onSale" => ['required', Rule::in([true, false, 0, 1])],
                "stockQuantity" => ['required', 'numeric'],
                "stockStatus" => ['required', Rule::in(['instock', 'outofstock'])],
                "dimensions" => ['nullable', 'regex:/^\d{1,3}x\d{1,3}x\d{1,3}cm$/'],
                "weight" => ['nullable', 'string', 'regex:/^\d+(\.\d+)?kg$/'],
                "image" => ['nullable', 'string'],
                "discontinued" => ['required', Rule::in([true, false, 0, 1])],
                "valid" => ['required', Rule::in([true, false, 0, 1])],
                "variation" => ['nullable', Rule::in([true, false, 0, 1])],
                "principalImage" => ['nullable', 'mimes:png,jpg,jpeg,webp'],
                "images.*" => ['nullable', 'mimes:png,jpg,jpeg,webp']
            ];
        } else {
            return [
                "name" => ['sometimes', 'required', 'string'],
                "categoryId" => ['sometimes', 'required', 'numeric'],
                "sku" => ['sometimes','string'],
                "ean" => ['sometimes','string'],
                "ean13" => ['sometimes','string'],
                "type" => ['sometimes', 'required', Rule::in(['simple', 'grouped', 'external', 'variable'])],
                "status" => ['sometimes', 'required', Rule::in(['draft', 'pending', 'private', 'publish'])],
                "featured" => ['sometimes', 'required', Rule::in([true, false, 0, 1])],
                "catalogVisibility" => ['sometimes', 'required', Rule::in(['visible', 'catalog', 'search', 'hidden'])],
                "description" => ['sometimes', 'string'],
                "shortDescription" => ['sometimes', 'string'],
                "price" => ['sometimes', 'required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'], // Numeric con máximo dos decimales
                "regularPrice" => ['sometimes', 'required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'], // Numeric con máximo dos decimales
                "salePrice" => ['sometimes', 'required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'], // Numeric con máximo dos decimales
                "onSale" => ['sometimes', 'required', Rule::in([true, false, 0, 1])],
                "stockQuantity" => ['sometimes', 'required', 'numeric'],
                "stockStatus" => ['sometimes', 'required', Rule::in(['instock', 'outofstock'])],
                "dimensions" => ['sometimes', 'nullable', 'regex:/^\d{1,3}x\d{1,3}x\d{1,3}cm$/'],
                "weight" => ['sometimes', 'nullable', 'string', 'regex:/^\d+(\.\d+)?kg$/'],
                "image" => ['sometimes', 'nullable', 'string'],
                "discontinued" => ['sometimes', 'required', Rule::in([true, false, 0, 1])],
                "valid" => ['sometimes', 'required', Rule::in([true, false, 0, 1])],
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
