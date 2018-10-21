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

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| Here is where you register route for public purpose. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Route::get('/', 'ViewController@showIndexPage')->name('welcome');

Route::prefix('product')->group(function(){
	Route::get('/', 'ViewController@showProductPage')->name('product');
	Route::get('/detail/{id}', 'ViewController@ProductDetail')->name('product.detail');
	Route::get('/images/{id}', 'ViewController@ProductImage');
});

Auth::routes();

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| Here is where you register route for The Customer. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('user')->group(function(){

	/////////////////////////GET//////////////////////
	Route::get('/cart', 'CartController@showPage')->name('show.cart.page');
	Route::get('/cart/items/show/{id}', 'CartController@showCartItems')->name('show.cart.items');
	Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

	//////////////////////////POST////////////////////
	Route::post('/cart/item/insert', 'CartController@addToCart')->name('insert.cart');

	/////////////////////////PATCH/////////////////////
	Route::patch('/cart/item/edit', 'CartController@updateItemQuantity')->name('edit.cart.item.qty');

	/////////////////////////DELETE///////////////////
	Route::delete('/cart/item/delete', 'CartController@deleteItemFromcart')->name('delete.cart.item');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you register route for The Admin. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function(){

	///////////////////////GET///////////////////////////

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::get('/', 'AdminController@showDashboardPage')->name('show.admin.dashboard.page');
	Route::get('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');
	Route::get('/product', 'ProductController@showPage')->name('show.admin.product.page');
	Route::get('/product/show', 'ProductController@DataTableProduct')->name('show.product');
	Route::get('/product/name/show', 'ProductController@Product')->name('show.product.name');
	Route::get('/product/type/list', 'ProductController@DataTableProductType')->name('list.product.type');
	Route::get('/product/type/show', 'ProductController@getProductType')->name('show.product.type');
	Route::get('/product/detail/show/{id}', 'ProductController@getProductDetail')->name('show.product.detail');
	Route::get('/product/image/show', 'ImageController@retrieveProductImage')->name('show.product.image');

	////////////////////POST//////////////////////////////

	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::post('/product/insert', 'ProductController@addProduct')->name('insert.product');
	Route::post('/product/type/insert', 'ProductController@addProductType')->name('insert.product.type');
	Route::post('/product/image/insert', 'ImageController@storeProductImages')->name('insert.product.image');

	/////////////////////PATCH///////////////////////////////

	Route::patch('/product/type/edit/{id}', 'ProductController@editProducType')->name('edit.product.type');
	Route::patch('/product/edit/{id}', 'ProductController@editProduct')->name('edit.product');

	/////////////////////DELETE/////////////////////////////

	Route::delete('/product/type/delete/{id}', 'ProductController@deleteProductType')->name('delete.product.type');
	Route::delete('/product/delete/{id}', 'ProductController@deleteProduct')->name('delete.product');
	Route::delete('/product/image/delete/{id}', 'ImageController@deleteProductImage')->name('delete.product.image');
});
