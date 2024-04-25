<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => ['required', 'numeric'],
            'customer_ip_address' => ['required', 'string'],
            'status' => ['required', Rule::in(['pending'])],
            'currency' => ['required', Rule::in(['EUR'])],
            'discount_total' => ['required', 'numeric'],
            'shipping_total' => ['required', 'numeric'],
            'tax_type' => ['required', Rule::in(['percentage', 'amount'])],
            'total_tax' => ['required', 'numeric'],
            'shipping_total_with_tax' => ['required', 'numeric'],
            'billing' => ['nullable', 'array'],
            'billing.*' => ['nullable', 'string'], // Regla para cada elemento del array "billing"
            'shipping' => ['nullable', 'array'],
            'shipping.*' => ['nullable', 'string'], // Regla para cada elemento del array "shipping"
            'payment_method' => ['required', 'string'],
            'payment_method_title' => ['required', 'string'],
            'date_paid' => ['nullable', 'date'],
            'date_completed' => ['nullable', 'date'],
            'line_items' => ['required', 'array'], // "lineItems" debe ser un array
            'line_items.*.id' => ['required', 'numeric'], // Regla para el campo "id" dentro de cada objeto en "lineItems"
            'line_items.*.name' => ['required', 'string'], // Regla para el campo "name" dentro de cada objeto en "lineItems"
            'line_items.*.price' => ['required', 'numeric'], // Regla para el campo "price" dentro de cada objeto en "lineItems"
            'line_items.*.quantity' => ['required', 'numeric'], // Regla para el campo "quantity" dentro de cada objeto en "lineItems"
            'coupon_lines' => ['nullable', 'array'],
            'coupon_lines.*' => ['nullable', 'string'], // Regla para cada elemento del array "coupon_lines"
        ];
    }


    protected function prepareForValidation()
    {

        if ($this->customerId) {
            $this->merge(['customer_id' => $this->customerId]);
        }
        if ($this->customerIpAddress) {
            $this->merge(['customer_ip_address' => $this->customerIpAddress]);
        }
        if ($this->discountTotal) {
            $this->merge(['discount_total' => $this->discountTotal]);
        }
        if ($this->shippingTotal) {
            $this->merge(['shipping_total' => $this->shippingTotal]);
        }
        if ($this->taxType) {
            $this->merge(['tax_type' => $this->taxType]);
        }
        if ($this->totalTax) {
            $this->merge(['total_tax' => $this->totalTax]);
        }
        if ($this->shippingTotalwithTax) {
            $this->merge(['shipping_total_with_tax' => $this->shippingTotalwithTax]);
        }
        if ($this->paymentMethod) {
            $this->merge(['payment_method' => $this->paymentMethod]);
        }
        if ($this->paymentMethodTitle) {
            $this->merge(['payment_method_title' => $this->paymentMethodTitle]);
        }
        if ($this->datePaid) {
            $this->merge(['date_paid' => $this->datePaid]);
        }
        if ($this->dateCompleted) {
            $this->merge(['date_completed' => $this->dateCompleted]);
        }
        if ($this->lineItems) {
            $this->merge(['line_items' => $this->lineItems]);
        }
        if ($this->couponLines) {
            $this->merge(['coupon_lines' => $this->couponLines]);
        }
    }
}
