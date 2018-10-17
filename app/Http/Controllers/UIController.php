<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UIController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function showPage()
    {
        return view('contents.admin.ui-control');
    }
}
