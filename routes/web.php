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
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/phpinfo', function(){
   phpinfo();
});
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/products_by_category/{category_id}', 'HomeController@filterProductsByCategory');
Route::post('/products_search', 'HomeController@searchProducts');

Route::group(['prefix' => 'product'], function(){
    //Route::get('', 'ProductController@index');
    //Route::post('', 'ProductController@store');
    Route::get('/{id}', 'ProductController@show');
});

Route::group(['prefix' => 'cart'], function(){
    Route::get('', 'CartController@index');
    Route::post('/add/{product_id}', 'CartController@add');
    Route::get('/remove/{product_id}', 'CartController@remove');
    Route::get('/clear', 'CartController@clear');
    Route::get('/all', 'CartController@all');
});

Route::group(['prefix' => 'order'], function(){
    Route::get('', 'OrderController@index');
    Route::post('/store', 'OrderController@store');
});
