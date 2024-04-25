<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'sku',
        "ean",
        "ean13",
        'type',
        'status',
        'featured',
        'catalog_visibility',
        'description',
        'short_description',
        'price',
        'regular_price',
        'sale_price',
        'on_sale',
        'stock_quantity',
        'stock_status',
        'weight',
        'dimensions',
        'image',
        'variation',
        'discontinued',
        'valid',
    ];
    
    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
