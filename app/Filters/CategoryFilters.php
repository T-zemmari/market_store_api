<?php

namespace App\Filters;

class CategoryFilters extends MyApiFilter
{

    protected $array_params = [
        'name'=>['eq','like'],
        'parent'=>['eq','lt','lte','gt','gte'],
    ];
    protected $array_columns_map = [];
    protected $array_operators_map = [
        'eq'=>'=',
        'like'=>'',
        'gt'=>'>',
        'gte'=>'>=',
        'lt'=>'<',
        'lte'=>'<=',
    ];
}
