<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Stock;
use App\Image;

class ViewController extends Controller
{

	public function ProductDetail($id)
	{
        $data = Product::where('product_id',$id)->with(['type','stock'])->first();
        // return dd($data);
        return view('contents.customer.product-detail', ['data' => $data]);
    }

    public function ProductImage($id)
    {
    	$data = Image::where('product_id', $id)->get();
    	// return dd($data);
    	return $data;
    }
    
	public function retrieveProduct()
	{
		$data = Product::all();
		return $data;
	}

	public function retrieveProductImage()
	{
		$data = Image::all();
		return $data;
	}

	public function retrieveProductAndImage()
	{
		$data = Product::join('images', 'images.product_id', '=', 'products.product_id')
			->select('images.*', 'products.*')
			->get();
		return $data;
	}

	public function showIndexPage()
	{
		return view('index', ['data' => $this->retrieveProductAndImage()]);
	}

	public function showProductPage()
	{
		return view('contents.customer.product');
	}
	
}
