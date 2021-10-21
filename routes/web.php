<?php
use Illuminate\Database\Eloquent\Builder;

use App\Order;

// Disable Form Register & Reset
Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/','FrontController@index')->name('index');
Route::get('/allmenu','FrontController@allmenu')->name('allmenu');
Route::get('/carts','CartController@index')->name('carts.index');
Route::get('/carts/{menu}/add','CartController@create')->name('carts.create');
Route::post('/carts/{menu}/add','CartController@store')->name('carts.store');
Route::delete('/carts/{menu}/delete','CartController@destroy')->name('carts.delete');

Route::post('/orders', 'OrderController@store')->name('orders.store');
Route::get('/orders', 'OrderController@index')->name('orders.index');
Route::put('/orders/confirmed/{order}', 'OrderController@confirm')->name('orders.confirm');
Route::put('/orders/rejected/{order}', 'OrderController@reject')->name('orders.reject');
Route::put('/orders/finished/{order}', 'OrderController@finish')->name('orders.finish');
Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
// Route::get('/tes', function(){
//     dd(json_decode(Cookie::get('carts')));
// });


// Route Login
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::resource('/category','CategoryController');
    Route::resource('/menu', 'MenuController');
    Route::resource('/user', 'UserController');
    Route::get('/pemasukkan','PemasukkanController@index')->name('pemasukkan');
});

