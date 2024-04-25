<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
                "name" => ['required'],
                "parent" => ['required'],
                "description" => ['required'],
                "short_description" => ['required'],
            ];
        } else {
            return [
                "name" => ['sometimes', 'required'],
                "parent" => ['sometimes', 'required'],
                "description" => ['sometimes', 'required'],
                "short_description" => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'short_description' => $this->shortDescription,
        ]);
    }
}
