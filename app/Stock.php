<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
	protected $primaryKey = 'product_id';

    protected $table = 'stocks';

    protected $fillable = [
        'product_id', 'product_qty', 
    ];

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }
}
