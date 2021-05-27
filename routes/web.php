<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => true, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Auth::routes([ 'register' => false ]);

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Registration Routes...
Route::get('/register', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::get('/qrcode', 'QrcodeController@index')->name('qrcode')->middleware('auth');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('orders', 'OrderController');

    Route::resource('suppliers', 'SupplierController');
    Route::resource('technicians', 'TechnicianController');
    Route::resource('supplierContacts', 'SupplierContactController');
    Route::resource('products', 'ProductController');
    Route::resource('productCategories', 'ProductCategoryController');
    Route::resource('clients', 'ClientController');
    Route::resource('users', 'UserController');
    Route::resource('departments', 'DepartmentController');
    Route::resource('deliveries', 'DeliveryController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
});
