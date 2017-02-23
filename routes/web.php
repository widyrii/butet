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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/cakes/{slug}','WelcomeController@cakes_detail');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'WelcomeController@index');
// Route::get('/', function() {
// 	return bcrypt('ariwidya');
// });
Route::get('/welcome', 'WelcomeController@index');
Route::post('/tryLogin', 'Auth\LoginController@tryLogin');

Route::get('master_cake/add', 'HomeController@master_cake_add');
Route::post('master_cake/save', 'HomeController@master_cake_save');
Route::get('master_cake/table', 'HomeController@master_cake_table');
Route::post('master_cake/update', 'HomeController@master_cake_update');
Route::get('master_cake/edit/{id}', 'HomeController@master_cake_edit');
Route::get('master_cake/delete/{id}', 'HomeController@master_cake_delete');


Route::get('cake/add', 'HomeController@cake_add');
Route::post('cake/save', 'HomeController@cake_save');
Route::get('cake/table', 'HomeController@cake_table');
Route::post('cake/update', 'HomeController@cake_update');
Route::get('cake/edit/{id}', 'HomeController@cake_edit');
Route::get('cake/delete/{id}', 'HomeController@cake_delete');

Route::get('/image/{filename}',function ($filename) {
	$path = storage_path() . '/' . $filename;
	$file = File::get($path);
	$type = File::mimeType($path);
	$response = Response::make($file);
	$response->header("Content-Type", $type);
	return $response;
});

Route::get('/category/{code_cake}','WelcomeController@category');

Route::get('/cakes_detail/','WelcomeController@category');


Route::get('/contact','WelcomeController@contact');
Route::post('/contact/save','WelcomeController@contact_save');
Route::get('/contact/table','HomeController@contact_table');

Route::get('/checkout','WelcomeController@checkout');

Route::post('/savecart','WelcomeController@save_cart');
	Route::get('/cart','WelcomeController@cart');
	Route::get('/carts','WelcomeController@carts');
	Route::get('hapuscart/{id}', function(Request $r, $id){
		$array = session('cart');
		unset($array[$id]);
		session(['cart' => $array]);
		return redirect()->back();
	});
	Route::get('/hapuscart', function(Request $request){
	return session()->forget('cart');
	// return redirect(url('ui.cart'));
	});
	Route::post('updatecart/{id}', 'WelcomeController@updatecart');

Route::get('order/shipping','WelcomeController@shipping');
Route::post('/shipping/save','WelcomeController@shipping_save');
Route::get('/shipping/table','HomeController@shipping_table');
Route::get('/shipping/delete/{id}', 'HomeController@shipping_delete');
Route::get('/shipping/reject/{id}', 'HomeController@shipping_reject');
Route::get('/shipping/accept/{id}', 'HomeController@shipping_accept');
Route::get('/cek_order', 'HomeController@cek_order');

Route::post('/sendemail/{code_shipping}', 'HomeController@shipping_sendemail');


Route::post('/register','WelcomeController@register');
Route::get('/cek_order/api/{code}', 'APIController@get_item');



