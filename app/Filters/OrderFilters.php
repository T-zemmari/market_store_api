<?php

namespace App\Filters;

class OrderFilters extends MyApiFilter
{
    protected $array_params = [
        'customerId' => ['eq'],
        'status' => ['eq','like'],
        'currency' => ['eq'],
        'discountTotal' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'shippingTotal' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'taxType' => ['eq'],
        'totalTax' => ['eq'],
        'shippingTotalWidthTax' => ['eq'],
        'date_paid' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'date_completed' => ['eq', 'lt', 'lte', 'gt', 'gte'],
    ];
    protected $array_columns_map = [
        'customerId' => 'customer_id',
        'discountTotal' => 'discount_total',
        'shippingTotal' => 'shipping_total',
        'taxType' => 'tax_type',
        'totalTax' => 'total_tax',
        'datePaid' => 'date_paid',
        'dateCompleted' => 'date_completed',
        'shippingTotalWidthTax' => 'shipping_total_width_tax',
    ];
    protected $array_operators_map = [
        'eq' => '=',
        'like' => 'LIKE',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];
}
