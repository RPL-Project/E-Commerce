<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('welcome');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){

	///////////////////////GET///////////////////////////

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');
	Route::get('/product', 'ProductController@showPage')->name('admin.product');
	Route::get('/uicontrol' , 'UIController@showPage')->name('admin.ui-control');
	Route::get('/getProduct', 'ProductController@retrieveProduct');
	Route::get('/getTypeList', 'ProductController@getTypeList');
	Route::get('/gettype', 'ProductController@retrieveType');
	Route::get('/getproductdetail/{id}', 'ProductController@getProductDetail');

	////////////////////POST//////////////////////////////

	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::post('/addproduct', 'ProductController@addProduct');
	Route::post('/addprdtype', 'ProductController@addPrdType');

	/////////////////////PATCH///////////////////////////////

	Route::patch('/editprdtype/{id}', 'ProductController@editPrdType');
	Route::patch('/editprd/{id}', 'ProductController@editProduct');

	/////////////////////DELETE/////////////////////////////

	Route::delete('/deleteprdtype/{id}', 'ProductController@deletePrdType');
	Route::delete('/deleteprd/{id}', 'ProductController@deleteProduct');
});
