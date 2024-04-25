<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer_id',
        'customer_ip_address',
        'status',
        'currency',
        'discount_total',
        'shipping_total',
        'tax_type',
        'total_tax',
        'shipping_total_with_tax',
        'billing',
        'shipping',
        'payment_method',
        'payment_method_title',
        'date_paid',
        'date_completed',
        'line_items',
        'coupon_lines',
        'set_paid',
    ];


    /**
     * Get the customer that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
}
