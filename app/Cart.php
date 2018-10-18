<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'customer_id', 'product_id', 'ordered_qty', 'order_status', 
    ];
}
