<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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

        $customerId = $this->route('customer') ? $this->route('customer')->id : null;

        $method = $this->method();
        if ($method == 'PUT') {
            return [
                "first_name" => ['required'],
                "last_name" => ['required'],
                "customer_type" => ['required', Rule::in(['individual', 'business'])],
                "adress" => ['required'],
                "postal_code" => ['required'],
                "city" => ['required'],
                "state" => ['required'],
                "country" => ['required'],
                "phone" => ['required'],
                //"is_paying_customer" => ['required'],
            ];
        } else {
            return [
                "first_name" => ['sometimes','required'],
                "last_name" => ['sometimes','required'],
                "customer_type" => ['sometimes','required', Rule::in(['individual', 'business'])],
                "adress" => ['sometimes','required'],
                "postal_code" => ['sometimes','required'],
                "city" => ['sometimes','required'],
                "state" => ['sometimes','required'],
                "country" => ['sometimes','required'],
                "phone" => ['sometimes','required'],
                "is_paying_customer" => ['sometimes','required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->firstName) {
            $this->merge(['first_name' => $this->firstName]);
        }
        if ($this->lastName) {
            $this->merge(['last_name' => $this->lastName]);
        }
        if ($this->customerType) {
            $this->merge(['customer_type' => $this->customerType]);
        }
        if ($this->postalCode) {
            $this->merge(['postal_code' => $this->postalCode]);
        }
        if ($this->isPayingCustomer) {
            $this->merge(['is_paying_customer' => $this->isPayingCustomer]);
        }
    }
}
