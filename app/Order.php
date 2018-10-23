<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';

	protected $table = 'orders';

    protected $fillable = [
        'customer_id', 'order_status',
    ];
}
