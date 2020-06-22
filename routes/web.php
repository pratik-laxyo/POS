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

Route::resource('/manager', 'Manager\ManagerController');
Route::resource('/item-kits', 'ItemKitsConroller');
Route::resource('/reports', 'ReportsConroller');
Route::resource('/receivings', 'ReceivingsConroller');
Route::resource('/sales', 'SalesConroller');

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
Route::resource('offers', 'Office\Offer\OfferController');
Route::get('test', 'Office\Shop\ShopController@testUser')->name('test');


Route::resource('employees', 'Office\Employees\EmployeesController');
Route::post('send-message', 'Office\Employees\EmployeesController@sendMessage')->name('send-message');

/* Items */
Route::resource('/items', 'Item\ItemController');
Route::post('fetch_item', 'Item\ItemController@fetchData')->name('fetch_item');
Route::post('excel_import', 'Item\ItemController@excelImportItems')->name('excel_import');
/* Items */

/* control Panel */
Route::resource('control_panel', 'Manager\ControlPanel\ControlPanel');
Route::get('cashier', 'Manager\ControlPanel\ControlPanel@Cashier')->name('cashier');
Route::get('cashier_detail', 'Manager\ControlPanel\ControlPanel@CashierDetail')->name('cashier_detail');
Route::get('offer_bundle', 'Manager\ControlPanel\ControlPanel@OfferBundle')->name('offer_bundle');
Route::get('group_location', 'Manager\ControlPanel\ControlPanel@GroupLocation')->name('group_location');
Route::get('custom_tab', 'Manager\ControlPanel\ControlPanel@CustomTab')->name('custom_tab');

	/* cashier_details */
	Route::post('add_cashier', 'Manager\ControlPanel\ControlPanel@AddCashierDetail')->name('add_cashier');
	Route::post('update_status', 'Manager\ControlPanel\ControlPanel@UpdateCashierStatusDetail')->name('update_status');
	Route::put('update_cashier', 'Manager\ControlPanel\ControlPanel@UpdateCashierDetail')->name('update_cashier');
	/* cashier_details */

	/* cashier */
	Route::post('cashier_shop', 'Manager\ControlPanel\ControlPanel@UpdateCashierShop')->name('cashier_shop');
	Route::post('fetch', 'Manager\ControlPanel\ControlPanel@fetchCashierShop')->name('fetch');
	/* cashier */

	/* Custom Tab */
	Route::post('custom', 'Manager\ControlPanel\ControlPanel@UpdateCustomTab')->name('custom');
	Route::post('fetchCustom', 'Manager\ControlPanel\ControlPanel@UpdateFetchCustomData')->name('fetchCustom');
	Route::post('custom_status', 'Manager\ControlPanel\ControlPanel@UpdateCustomStatus')->name('custom_status');
	/* Custom Tab */

	/* Offer Bundle */
	Route::post('add_bundle', 'Manager\ControlPanel\ControlPanel@AddOfferBundle')->name('add_bundle');
	Route::post('get_list', 'Manager\ControlPanel\ControlPanel@GetOfferBundleTypes')->name('get_list');
	/* Offer Bundle */

/* control Panel */
