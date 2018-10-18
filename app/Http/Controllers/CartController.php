<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Cart;

class CartController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function addToCart(Request $req)
    {
    	$data = new Cart();
    	$data->customer_id = $req->customerid;
    	$data->product_id = $req->productid;
    	$data->ordered_qty = $req->orderqty;
    	$data->save();

    	return response()->json();
    }

}
