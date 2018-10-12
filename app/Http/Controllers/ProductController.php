<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use DB;

class ProductController extends AdminController
{
    
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    private function getPrdType()
    {
        $data = DB::table('product_types')->select('product_types.*')->get();
        return $data;
    }

    private function getProduct(){
        $data = Product::join('product_types','product_types.product_type_id', '=', 'products.product_type_id')->get();
        return $data;
    }

    public function showPage()
    {
        return view('contents.product', ['prdType' => $this->getPrdType(), 'product' => $this->getProduct(), 'no' => '1']);
    }

    public function retrieveProduct()
    {
    	$reqData = Product::join('product_types','product_types.product_type_id', '=', 'products.product_type_id')->select('products.*', 'product_types.*')->get();
        $data = array('data' => $reqData);
        return response()->json($data);
    }

    public function getTypeList()
    {
        $reqData = $this->getPrdType();
        $data = array('data' => $reqData);
        return response()->json($data);
    }

    public function addProduct(Request $req)
    {
        $data = new Product();
        $data->product_name = $req->prdName;
        $data->product_type_id = $req->prdType;
        $data->product_price = $req->prdPrice;
        $data->product_color = $req->prdColor;
        $data->product_size = $req->prdSize;
        $data->product_desc = $req->prdDesc;
        $data->other_product_desc = $req->othDesc;
        $data->save();
        return response()->json($data);
    }

    public function editProduct(Request $req, $id)
    {
        $data = Product::where('product_id', $id)->update([
            'product_name' => $req->prdName,
            'product_type_id' => $req->prdType,
            'product_price' => $req->prdPrice,
            'product_color' => $req->prdColor,
            'product_size' => $req->prdSize,
            'product_desc' => $req->prdDesc,
            'other_product_desc' => $req->othDesc,
        ]);
        return response()->json($data);
    }

    public function deleteProduct($id)
    {
        Product::where('product_id', $id)->delete();
        return response()->json();
    }

    public function addPrdType(Request $req)
    {
        $preData = $this->strSplit($req->prdTypeDesc);
        foreach ($preData as $key) {
            $data = DB::table('product_types')->insert([
                'product_type_desc' => $key,
            ]);
        }
        return response()->json($data);
    }

    public function editPrdType(Request $req, $id)
    {
        $data = DB::table('product_types')->where('product_type_id', $id)->update([
            'product_type_desc' => $req->prdTypeDesc,
        ]);
        return response()->json($data);
    }

    public function deletePrdType($id)
    {
        DB::table('product_types')->where('product_type_id', $id)->delete();
        return response()->json();
    }

    public function addPrdImage(Request $req)
    {
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $img_url = public_path() . '/images/product/' . $file->getClientOriginalName();
            $file->move(public_path() . '/images/product/', $file->getClientOriginalName());
            $data = DB::table('product_images')->insert([
                'file_name' => $img_url,
                'file_size' => $file->getClientSize(),
                'file_type' => $file->getClientMimeType(),
            ]);
            return response()->json($data);
        }

    }

}
