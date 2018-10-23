<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends AdminController
{
    
	public function storeProductImages(Request $req)
	{
		$this->validate($req, [
			'filemain' => 'required',
			'filemain.*' => 'image|mimes:jpeg,jpg,png,gif,svg|max:6144',
			// 'filename' => 'required',
			// 'filename.*' => 'image|mimes:jpeg,jpg,png,gif,svg|max:6144',
		]);

		$id = $req->productid;
		$prdName = $req->productname;

		if($req->hasFile('filemain'))
		{
			$file = $req->file('filemain');
			$name = $id . "_" . $prdName . "." . $file->getClientOriginalExtension();
			$store = new Image();
			$store->product_id = $id;
			$store->file_name = $name;
			$store->file_type = "Main";
			$store->save();
			$file->move(public_path() . '/images/product/' , $name);
		}

		// if($req->hasFile('filename'))
		// {
		// 	$no = 0;
		// 	foreach($req->file('filename') as $image)
		// 	{
		// 		$no++;
		// 		$name = $id . "_" . $no . "_" . $prdName . "_EXT" . "." .$file->getClientOriginalExtension();
		// 		$store = new Image();
		// 		$store->product_id = $id;
		// 		$store->file_name = $name;
		// 		$store->file_type = "Ext";
		// 		$store->save();
		// 		$image->move(public_path() . '/images/product/' , $name);
		// 	}
		// }

		return back();
	}

	public function editProductImage(Request $req, $id)
	{
		
	}

	public function retrieveProductImage()
	{
		$preData = Image::join('products','products.product_id', '=', 'images.product_id')->select('images.*', 'products.*')->get();
		$data = array('data' => $preData);
		return response()->json($data);
	}

	public function deleteProductImage($name)
	{

		Image::where('file_name', $name)->delete();

        $image_path = '/images/product/'. $name;
        unlink(public_path().$image_path);

        return back();
	}


	// public function storeBannerImage(Request $req)
	// {
	// 	$this->validate($req,[
	// 		'bannerImage' => 'required',
	// 		'bannerImage.*' => 'image|mimes:jpeg,png,jpg,svg,gif|max:6144',
	// 	]);


	// }

}
