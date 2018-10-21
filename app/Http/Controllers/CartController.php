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

    public function showPage()
    {
        return view('contents.customer.cart');
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

    public function deleteItemFromcart(Request $req)
    {
        Cart::where('customer_id', $req->custId)
            ->where('product_id', $req->prodId)
            ->delete();
        return response()->json();
    }

    public function showCartItems($id)
    {
    	$data = Cart::where('customer_id', $id)
    				->join('products', 'products.product_id', '=', 'carts.product_id')
    				->join('images', 'images.product_id', '=', 'carts.product_id')
    				->select('carts.*', 'products.*', 'images.*')
    				->where('images.file_type', 'Main')
    				->get();
    	return response()->json($data);
    }

    public function updateItemQuantity(Request $req)
    {
        Cart::where('product_id', $req->productid)->where('customer_id', $req->customerid)->update([
                'ordered_qty' => $req->orderqty,
        ]);

        $data = Cart::where('carts.product_id', $req->productid)
                ->join('products', 'products.product_id','=','carts.product_id')
                ->select('products.product_price', 'carts.*')
                ->where('carts.customer_id', $req->customerid)
                ->get();

        return response()->json($data);
    }

}
