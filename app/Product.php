<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'product_type_id', 'product_price', 'product_color', 'product_size', 'product_desc', 'other_product_desc',
    ];
}
