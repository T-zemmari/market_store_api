<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    
    protected $fillable=[
        "first_name",
        "last_name",
        "customer_type",
        "email",
        "password",
        "adress",
        "postal_code",
        "city",
        "state",
        "country",
        "phone",
        "is_paying_customer",
        "status",
    ];

    /**
     * Get all of the orders for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
