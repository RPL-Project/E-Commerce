<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    protected function loggedAdmin()
    {
        if(Auth::guard('admin')->check())
        {
            $data = Auth::guard('admin')->user();
        }

        return $data;
    }

    public function showDashboardPage()
    {
        return view('contents.admin.dashboard');
    }

    protected function stringSplit($str)
    {
        $postStr = explode(",", $str);
        return $postStr;
    }

    protected function imageFileName($id)
    {
        $image = DB::table('images')->where('product_id', $id)->get();
        return $image;
    }


}
