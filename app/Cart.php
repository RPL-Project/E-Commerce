<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

	protected $table = 'carts';

	protected $guard = 'web';

    protected $fillable = [
        'customer_id', 'product_id', 'order_id' ,'order_qty', 
    ];
}
