<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    
	public function storeProductImages(Request $req)
	{
		$this->validate($req, [
			'filemain' => 'required',
			'filemain.*' => 'image|mimes:jpeg,jpg,png,gif,svg|max:6144',
			'filename' => 'required',
			'filename.*' => 'image|mimes:jpeg,jpg,png,gif,svg|max:6144',
		]);

		$id = $req->productid;

		if($req->hasFile('filemain'))
		{
			$file = $req->file('filemain');
			$name = $id . "_MAIN_" .$file->getClientOriginalName();
			$store = new Image();
			$store->product_id = $id;
			$store->file_name = $name;
			$store->file_type = "Main";
			$store->save();
			$file->move(public_path() . '/images/product/' , $name);
		}

		if($req->hasFile('filename'))
		{
			foreach($req->file('filename') as $image)
			{
				$name = $id . "_EXT_" .$image->getClientOriginalName();
				$store = new Image();
				$store->product_id = $id;
				$store->file_name = $name;
				$store->file_type = "Ext";
				$store->save();
				$image->move(public_path() . '/images/product/' , $name);
			}
		}

		return back()->with('success', 'Image Has Been Saved');
	}

	public function retrieveProductImage()
	{
		$preData = Image::join('products','products.product_id', '=', 'images.product_id')->select('images.*', 'products.*')->get();
		$data = array('data' => $preData);
		return response()->json($data);
	}


	// public function storeBannerImage(Request $req)
	// {
	// 	$this->validate($req,[
	// 		'bannerImage' => 'required',
	// 		'bannerImage.*' => 'image|mimes:jpeg,png,jpg,svg,gif|max:6144',
	// 	]);


	// }

}
