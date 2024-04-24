<?php

namespace App\Filters;

class CategoryFilters extends MyApiFilter
{

    protected $array_params = [
        'name'=>['eq'],
        'parent'=>['eq','lt','lte','gt','gte'],
    ];
    protected $array_columns_map = [
        'firstName'=>'first_name',
        'lastName'=>'last_name',
        'isPayingCustomer'=>'is_paying_customer',
        'postalCode'=>'postal_code',
        'customerType'=>'customer_type',
    ];
    protected $array_operators_map = [
        'eq'=>'=',
        'gt'=>'>',
        'gte'=>'>=',
        'lt'=>'<',
        'lte'=>'<=',
    ];
}
