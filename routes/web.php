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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return Auth::check() ? view('/home') :  view('auth.login');
});
Auth::routes(['register' => false]);


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/customers', 'CustomerController');
Route::get('/allcustomer', 'CustomerController@getCustomer')->name('allcustomer');
Route::resource('/items', 'ItemController');

Route::resource('/manager', 'Manager\ManagerController');
Route::resource('/item-kits', 'ItemKitsConroller');
Route::resource('/reports', 'ReportsConroller');
Route::resource('/receivings', 'ReceivingsConroller');
Route::resource('/sales', 'SalesConroller');
Route::resource('/offices', 'OfficesConroller');

Route::post('import', 'CustomerController@import')->name('import');
Route::get('export', 'CustomerController@export')->name('export');
Route::get('phone-export', 'CustomerController@exportPhonenumber')->name('phone-export');

Route::resource('/mci', 'Manager\ManagerMCIController');

Route::resource('/mci-category', 'Manager\MCICategoryController');

Route::resource('/mci-subcategory', 'Manager\MCISubCategoryController');
Route::resource('/mci-size', 'Manager\MCISizeController');
Route::resource('/mci-color', 'Manager\MCIColorController');
Route::resource('/mci-brand', 'Manager\MCIBrandController');

Route::resource('/office', 'Office\OfficeController');
Route::resource('shop', 'Office\Shop\ShopController');
Route::get('test', 'Office\Shop\ShopController@testUser')->name('test');

Route::resource('employees', 'Office\Employees\EmployeesController');
Route::post('send-message', 'Office\Employees\EmployeesController@sendMessage')->name('send-message');

