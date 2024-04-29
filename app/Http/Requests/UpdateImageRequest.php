<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
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
                'product_id' => ['required'],
                'url_image' => ['required', 'string'],
                'active' => ['required', 'boolean'],
            ];
        } else {
            return [
                'product_id' => ['sometimes', 'required'],
                'url_image' => ['sometimes', 'required', 'string'],
                'active' => ['sometimes', 'required', 'boolean'],
            ];
        }
    }
}
