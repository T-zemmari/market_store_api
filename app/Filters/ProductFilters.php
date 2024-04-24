<?php

namespace App\Filters;

class ProductFilter extends MyApiFilter
{

    protected $array_params = [
        'name' => ['eq'],
        'parent' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'sku' => ['eq'],
        'type' => ['eq'],
        'status' => ['eq'],
        'catalog_visibility' => ['eq'],
        'price' => ['eq'],
        'regular_price' => ['eq'],
        'sale_price' => ['eq'],
        'on_sale' => ['eq'],
        'stock_quantity' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'stock_status' => ['eq'],
    ];
    protected $array_columns_map = [
        'categoryId' => 'category_id',
        'catalogVisibility' => 'catalog_visibility',
        'OnSale' => 'on_sale',
        'salePrice' => 'sale_price',
        'Stock' => 'stock_quantity',
        'parentId' => 'parent_id',
    ];
    protected $array_operators_map = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];
}
