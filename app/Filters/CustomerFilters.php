<?php

namespace App\Filters;

class CustomerFilters extends MyApiFilter
{

    protected $array_params = [
        'firstName'=>['eq','like'],
        'lastName'=>['eq','like'],
        'customerType'=>['eq'],
        'email'=>['eq'],
        'adress'=>['eq'],
        'postalCode'=>['eq'],
        'city'=>['eq'],
        'state'=>['eq'],
        'country'=>['eq'],
        'phone'=>['eq'],
        'isPayingCustomer'=>['eq'],
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
        'like'=>'LIKE',
        'gt'=>'>',
        'gte'=>'>=',
        'lt'=>'<',
        'lte'=>'<=',
    ];
}
