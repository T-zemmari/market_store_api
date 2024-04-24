<?php

namespace App\Filters;

class CategoryFilters extends MyApiFilter
{

    protected $array_params = [
        'name'=>['eq'],
        'parent'=>['eq','lt','lte','gt','gte'],
    ];
    protected $array_columns_map = [];
    protected $array_operators_map = [
        'eq'=>'=',
        'gt'=>'>',
        'gte'=>'>=',
        'lt'=>'<',
        'lte'=>'<=',
    ];
}
