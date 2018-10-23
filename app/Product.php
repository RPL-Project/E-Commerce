<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $primaryKey = 'product_id';

	protected $table = 'products';

    protected $fillable = [
        'product_name', 'product_type_id', 'product_price', 'product_desc', 'other_product_desc',
    ];

    public function type()
    {
    	return $this->belongsTo('App\ProductType', 'product_type_id');
    }

    public function stock()
	{
		return $this->hasOne('App\Stock', 'product_id');
	}

    public function images()
    {
        return $this->hasMany('App\Image', 'product_id');
    }

    public function mainImage()
    {
        return $this->images()->where('file_type', 'Main');
    }

    public function extImages()
    {
        return $this->images()->where('file_type', 'Ext');
    }
}
