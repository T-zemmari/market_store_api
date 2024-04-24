<?php

namespace App\Filters;

class OrderFilter extends MyApiFilter
{
    protected $array_params = [
        'customer_id' => ['eq'],
        'status' => ['eq'],
        'currency' => ['eq'],
        'discount_total' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'shipping_total' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'tax_type' => ['eq'],
        'total_tax' => ['eq'],
        'prices_include_tax' => ['eq'],
        'shipping_total_width_tax' => ['eq'],
        'date_paid' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'date_completed' => ['eq', 'lt', 'lte', 'gt', 'gte'],
    ];
    protected $array_columns_map = [
        'customerId' => 'customer_id',
        'discountTotal' => 'discount_total',
        'shippingTotal' => 'shipping_total',
        'taxType' => 'tax_type',
        'totalTax' => 'total_tax',
        'pricesIncludeTax' => 'prices_include_tax',
        'datePaid' => 'date_paid',
        'dateCompleted' => 'date_completed',
    ];
    protected $array_operators_map = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];
}
