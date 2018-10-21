<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
	protected $primaryKey = 'product_type_id';

    protected $table = 'product_types';

    protected $fillable = [
        'product_type_desc', 
    ];

    public function product()
    {
    	return $this->hasMany('App\Product', 'product_type_id');
    }
}
