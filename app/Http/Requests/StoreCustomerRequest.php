<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class StoreCustomerRequest extends FormRequest
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
            "first_name" => ['required'],
            "last_name" => ['required'],
            "customer_type" => ['required', Rule::in(['individual', 'business'])],
            "email" => ['required', 'email', function ($attribute, $value, $fail) {
                // Check if the email already exists in the database
                $existingEmail = \App\Models\Customer::where('email', $value)->exists();
                if ($existingEmail) {
                    $fail('The email address is already in use.');
                }
            }],            "password" => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            "adress" => ['required'],
            "postal_code" => ['required'],
            "city" => ['required'],
            "state" => ['required'],
            "country" => ['required'],
            "phone" => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'customer_type' => $this->customerType,
            'postal_code' => $this->postalCode,
            'password' => Hash::make($this->password),
        ]);
    }
}
