<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Stock;
use App\Image;
use DB;

class ProductController extends AdminController
{

    public function Product()
    {
        $data = Product::all();
        return $data;
    }

    public function DataTableProduct()
    {
        $reqData = Product::join('product_types','product_types.product_type_id', '=', 'products.product_type_id')
                    ->join('stocks', 'stocks.product_id', '=', 'products.product_id')
                    ->select('products.*', 'product_types.*', 'stocks.*')
                    ->get();
        $data = array('data' => $reqData);
        return response()->json($data);
    }

    public function ProductType()
    {
        $data = ProductType::all();
        return $data;
    }

    public function DataTableProductType()
    {
        return array('data' => $this->ProductType());
    }

    public function Stock(){
        $data = Stock::all();
        return $data;
    }

    public function showPage()
    {
        return view('contents.admin.product', ['prdType' => $this->ProductType(), 'product' => $this->Product(), 'no' => '1']);
    }

    public function getProductType()
    {
        $data = $this->ProductType();
        return $data;
    }

    public function showProductTable()
    {
    	$reqData = Product::join('product_types','product_types.product_type_id', '=', 'products.product_type_id')
                    ->join('stocks', 'stocks.product_id', '=', 'products.product_id')
                    ->select('products.*', 'product_types.*', 'stocks.*')
                    ->get();
        $data = array('data' => $reqData);
        return response()->json($data);
    }

    public function showProductTypeTable()
    {
        $data = $this->ProductType();
        return $data;
    }

    public function getProductDetail($id)
    {
        $data = Product::where('products.product_id', $id)
                ->join('stocks', 'stocks.product_id' , '=', 'products.product_id')
                ->join('product_types', 'product_types.product_type_id', '=', 'products.product_type_id')
                ->select('stocks.*', 'products.*', 'product_types.*')->get();
        return response()->json($data);
    }

    public function addProduct(Request $req)
    {

        DB::transaction(function() use ($req){

            $data = new Product();
            $data->product_name = $req->prdName;
            $data->product_type_id = $req->prdType;
            $data->product_price = $req->prdPrice;
            $data->product_desc = $req->prdDesc;
            $data->other_product_desc = $req->othDesc;
            $data->save();

            $id = DB::getPdo()->lastInsertId();

            DB::table('stocks')->insert([
                'product_id' => $id,
                'product_qty' => $req->prdQty,
            ]);

        });
        return response()->json();
    }

    public function editProduct(Request $req, $id)
    {

        DB::transaction(function() use ($req,$id){

            $data = Product::where('product_id',$id)->update([

                'product_name' => $req->prdName,
                'product_type_id' => $req->prdType,
                'product_price' => $req->prdPrice,
                'product_desc' => $req->prdDesc,
                'other_product_desc' => $req->othDesc,

            ]);

            DB::table('stocks')->where('product_id', $id)->update([
                'product_qty' => $req->prdQty,
            ]);

        });
        return response()->json();
    }

    public function deleteProduct($id)
    {
        DB::transaction(function() use ($id){

            $image = $this->imageFileName($id);

            foreach($image as $key){
                $image_path = '/images/product/'.$key->file_name;
                unlink(public_path().$image_path);
            }

            Product::where('product_id', $id)->delete();

        });
        return response()->json();
    }

    public function addProductType(Request $req)
    {
        $preData = $this->stringSplit($req->prdTypeDesc);
        foreach ($preData as $key) {
            $data = DB::table('product_types')->insert([
                'product_type_desc' => $key,
            ]);
        }
        return response()->json($data);
    }

    public function editProducType(Request $req, $id)
    {
        $data = DB::table('product_types')->where('product_type_id', $id)->update([
            'product_type_desc' => $req->prdTypeDesc,
        ]);
        return response()->json($data);
    }

    public function deleteProductType($id)
    {
        DB::table('product_types')->where('product_type_id', $id)->delete();
        return response()->json();
    }

}
