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
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return Auth::check() ? view('/home') :  view('auth.login');
});
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/customers', 'CustomerController');
Route::get('/allcustomer', 'CustomerController@getCustomer')->name('allcustomer');
Route::resource('/items', 'ItemController');
Route::resource('/manager', 'ManagerConroller');
Route::resource('/item-kits', 'ItemKitsConroller');
Route::resource('/reports', 'ReportsConroller');
Route::resource('/receivings', 'ReceivingsConroller');
Route::resource('/sales', 'SalesConroller');
Route::resource('/offices', 'OfficesConroller');
