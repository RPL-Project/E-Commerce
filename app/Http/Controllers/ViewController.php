<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;

class ViewController extends Controller
{
    
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

	public function showIndex()
	{
		return view('index', ['data' => $this->retrieveProductAndImage()]);
	}

	public function showCart()
	{
		return view('contents.customer.cart');
	}

}
