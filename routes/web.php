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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('patients','PatientsController');
Route::resource('nurses','NursesController');
Route::resource('doctors','DoctorsController');

Route::resource('products','ProductsController');
Route::get('edit-product', function(){
    return View::make('product.edit');
});
Route::resource('orders','OrdersController');
Route::get('product/{product}/plan/{plan}/price/{price}',[
    'as' => 'makeOrder',
    'uses'=> 'OrdersController@makeOrder'
]);
Route::get('patient/{patient}',[
    'as' => 'editPatient',
    'uses'=> 'PagesController@patients'
]);
Route::resource('hire','HiresController');
