<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

	protected $table = 'images';

    protected $fillable = [
        'product_id', 'file_name', 'file_type',
    ];

    public function product()
    {
    	return $this->hasOne('App\Product', 'product_id');
    }
}
