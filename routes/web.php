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
    return view('top');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(["middleware"=>"auth"],function(){
    Route::any('/operater_index', 'OperaterIndexController@operater_index');
    Route::get('/register_customer', 'RegisterCustomerController@register_customer');
    Route::get("operater_update_customer","OperaterUpdateCustomerController@operater_update_customer");
    Route::post("operater_update_customer","OperaterUpdateCustomerController@operater_update_customer2");
    Route::any("operater_message","OperaterMessageController@operater_message");




    Route::any("my_page","MyPageController@my_page");
    Route::get("customer_update","CustomerUpdateController@customer_update");
    Route::any("customer_message","CustomerMessageController@customer_message");
});
