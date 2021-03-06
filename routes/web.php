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
Route::resource('configuration', 'Office\Configuration\ConfigurationController');
Route::get('test', 'Office\Shop\ShopController@testUser')->name('test');


Route::resource('employees', 'Office\Employees\EmployeesController');
Route::post('send-message', 'Office\Employees\EmployeesController@sendMessage')->name('send-message');

/* Items */
Route::resource('/items', 'Item\ItemController');
Route::post('fetch_item', 'Item\ItemController@fetchData')->name('fetch_item');
Route::post('excel_import', 'Item\ItemController@excelImportItems')->name('excel_import');
/* Items */


/* Managers */
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

		Route::post('cashier_auth', 'Manager\ControlPanel\ControlPanel@cashier_auth')->name('cashier_auth');
		/* Custom Tab */

		/* Offer Bundle */
		Route::post('add_bundle', 'Manager\ControlPanel\ControlPanel@AddOfferBundle')->name('add_bundle');
		Route::post('get_list', 'Manager\ControlPanel\ControlPanel@GetOfferBundleTypes')->name('get_list');
		/* Offer Bundle */	

		/* Group Locations */
		Route::post('add_locations', 'Manager\ControlPanel\ControlPanel@AddLocationGroup')->name('add_locations');
		/* Group Locations */	

	/* control Panel */

	/* Extras */
	Route::resource('extras', 'Manager\Extras\Extras');
	Route::post('quickdata', 'Manager\Extras\Extras@QuickConvert')->name('quickdata');
	/* Extras */

	/* Extras */
	Route::resource('list_actions', 'Manager\ListAction\ListAction');
	Route::get('download', 'Manager\ListAction\ListAction@CSVDownload')->name('download');
	Route::post('getListActionMCI', 'Manager\ListAction\ListAction@GettListActionMCI')->name('getListActionMCI');
	Route::post('get_listaction_data', 'Manager\ListAction\ListAction@GettListActionData')->name('get_listaction_data');
	/* Extras */

/* Managers */

/* Offers */
Route::resource('offers', 'Office\Offer\OfferController');
	/* Dynamic Pricing */
	Route::get('view_dynamic_pricing', 'Office\Offer\OfferController@DynamicPricings')->name('view_dynamic_pricing');
	Route::post('add_pricing', 'Office\Offer\OfferController@AddPricing')->name('add_pricing');
	/* Dynamic Pricing */
	
	/* Vouchers */	
	Route::get('view_vouchers', 'Office\Offer\OfferController@Vouchers')->name('view_vouchers');
	Route::post('add_voucher', 'Office\Offer\OfferController@AddVouchers')->name('add_voucher');
	Route::put('update_voucher', 'Office\Offer\OfferController@UpdateVouchers')->name('update_voucher');
	Route::post('print_voucher', 'Office\Offer\OfferController@PrintVouchers')->name('print_voucher');
	Route::get('view_voucher', 'Office\Offer\OfferController@ViewVouchers')->name('view_voucher');
	/* Vouchers */	

	/* Purchase Limits */
	Route::get('view_purchase_limits', 'Office\Offer\OfferController@PurchaseLimits')->name('view_purchase_limits');
	Route::post('add_limits', 'Office\Offer\OfferController@AddPurchaseLimit')->name('add_limits');
	Route::post('update__limiter_status', 'Office\Offer\OfferController@UpdateLimitStatus')->name('update__limiter_status');	
	Route::put('update_limit_counts', 'Office\Offer\OfferController@UpdateLimitCounts')->name('update_limit_counts');	
	/* Purchase Limits */

/* Offers */

/* Receivings */
Route::resource('/receivings', 'Receivings\ReceivingsController');
Route::post('/get-item', 'Receivings\ReceivingsController@getItem')->name('get-item');
Route::post('/updateQty', 'Receivings\ReceivingsController@updateQty')->name('updateQty');
Route::get('/view-manage-transfer', 'Receivings\ReceivingsController@viewManageTransfer')->name('view-manage-transfer');
Route::post('/all-chalances', 'Receivings\ReceivingsController@allChalances')->name('all-chalances');
/* End Receivings */

/* Sales */
Route::resource('/sales', 'Sales\SalesController');
Route::post('/get-sale-item', 'Sales\SalesController@getSaleItem')->name('get-sale-item');
Route::post('/get-customer', 'Sales\SalesController@getCustomer')->name('get-customer');
Route::post('/add-customer', 'Sales\SalesController@addCustomer')->name('add-customer');
Route::post('/store-customer', 'Sales\SalesController@storeCustomer')->name('store-customer');
Route::post('/customer-cert-destroy/{id}', 'Sales\SalesController@customerCertDestroy')->name('customer-cert-destroy');
Route::post('/updatSaleItemeQty', 'Sales\SalesController@updateQty')->name('updatSaleItemeQty');
Route::resource('/sales-manage', 'Sales\SalesManageController');
Route::get('/sales-invoice/{id}','Sales\SalesManageController@salesInvoice')->name('sales-invoice');
Route::post('/cert-items','Sales\SalesManageController@certItems')->name('cert-items');
Route::post('/igst-tax','Sales\SalesManageController@IgstTax')->name('igst-tax');
/* End Sales */

