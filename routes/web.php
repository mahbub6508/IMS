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

Auth::routes();

//Route::get('/', 'HomeController@redirectAdmin')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-category/{id}','Backend\PurchaseController@getCategory')->name('get-category');

Route::group(['prefix'=>'admin'], function (){
	Route::get('/','Backend\DashboardController@index')->name('admin.dashboard');
//-----------Admin-----------
    Route::resource('admins','Backend\AdminsController',['names' => 'admin.admins']);

//--------Roles----------
	Route::resource('roles', 'Backend\RolesController',['names' => 'admin.roles']);
	Route::resource('user','Backend\UsersController',['names' => 'admin.user']);

	// Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    //--------Category
    Route::resource('category','Backend\CategoryController',['names' => 'admin.category']);

    //---------Warehouse
    Route::resource('warehouse','WarehouseController',['names' => 'admin.warehouse']);

    Route::resource('brand','Backend\BrandController',['names' => 'admin.brand']);

    //-----product

    Route::get('product/{id}/update-stock', 'Backend\ProductController@updateStock')->name('product.update-stock');
	Route::post('product/{id}/update-stock', 'Backend\ProductController@saveStock',['names' => 'admin.stock']);

	Route::resource('product','Backend\ProductController',['names' => 'admin.product']);
    Route::resource('stock','Backend\StockController');

    Route::resource('supplier','Backend\SupplierController',['names' => 'admin.supplier']);

    Route::resource('customer','Backend\CustomerController',['names' => 'admin.customer']);

    Route::resource('unit','Backend\UnitController',['names' => 'admin.unit']);

    Route::resource('purchase','Backend\PurchaseController',['names' => 'admin.purchase']);

    
    Route::get('get-product','Backend\PurchaseController@getProduct')->name('get-product');

    Route::get('purchasepending','Backend\PurchaseController@pendingList')->name('admin.purchase.pending');

    Route::resource('invoice','Backend\InvoiceController',['names' => 'admin.invoice']);
    Route::get('invoicepending','Backend\InvoiceController@pendingInvoice')->name('admin.invoice.pending');
    Route::get('get-stock','Backend\InvoiceController@getStock')->name('check-product-stock');

    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
});