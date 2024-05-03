<?php

namespace App\Filters;

class ProductFilters extends MyApiFilter
{

    protected $array_params = [
        'name' => ['eq','like'],
        'categoryId' => ['eq'],
        'parent' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'sku' => ['eq'],
        'type' => ['eq'],
        'status' => ['eq'],
        'price' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'salePrice' => ['eq'],
        'OnSale' => ['eq'],
        'stockQuantity' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'stockStatus' => ['eq','like'],
    ];
    protected $array_columns_map = [
        'categoryId' => 'category_id',
        'OnSale' => 'on_sale',
        'salePrice' => 'sale_price',
        'stockQuantity' => 'stock_quantity',
        'stockStatus' => 'stock_status',
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
