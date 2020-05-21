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

// Route::get('/', function () {
//     return view('welcome');
// });

// CUSTOMER
Route::get('/', 'CustomerController@index');
Route::get('checkin', 'CustomerController@login');
Route::get('order/{id}', 'CustomerController@order_detail');
Route::get('get/order', 'CustomerController@get_order');
Route::get('neworder', 'CustomerController@select_stand');
Route::post('neworder/stand', 'CustomerController@add_order');
Route::get('neworder/checkout/{id}', 'CustomerController@checkout');

Route::post('set_customer', 'CustomerCrudController@set_customer');
Route::post('add_order', 'CustomerCrudController@add_order');
Route::get('add_order/confirm/{id}', 'CustomerCrudController@confirm');

// ADMIN
Route::get('admin', 'AdminController@index');
Route::get('admin/stand', 'AdminController@master_stand');
Route::get('admin/cashier', 'AdminController@master_cashier');
Route::get('admin/table', 'AdminController@master_table');

Route::post('admin/add_stand', 'AdminCrudController@add_stand');
Route::get('admin/get/stand/{id}', 'AdminCrudController@get_stand_by_id');
Route::post('admin/edit_stand', 'AdminCrudController@edit_stand');
Route::post('admin/add_cashier', 'AdminCrudController@add_cashier');
Route::get('admin/get/cashier/{id}', 'AdminCrudController@get_cashier_by_id');
Route::post('admin/edit_cashier', 'AdminCrudController@edit_cashier');
Route::post('admin/add_table', 'AdminCrudController@add_table');
Route::get('admin/get/table/{id}', 'AdminCrudController@get_table_by_id');
Route::post('admin/edit_table', 'AdminCrudController@edit_table');
Route::get('admin/delete/{table}/{id}', 'AdminCrudController@delete');


// STAND
Route::get('stand', 'StandController@index');
Route::get('stand/order/{id}', 'StandController@order_detail');
Route::get('stand/get/order/', 'StandController@get_order');
Route::get('stand/category', 'StandController@menu_category');
Route::get('stand/menu', 'StandController@menu');

Route::post('stand/add_category', 'StandCrudController@add_category');
Route::get('stand/get/category/{id}', 'StandCrudController@get_category_by_id');
Route::post('stand/edit_category', 'StandCrudController@edit_category');
Route::post('stand/add_menu', 'StandCrudController@add_menu');
Route::get('stand/get/menu/{id}', 'StandCrudController@get_menu_by_id');
Route::post('stand/edit_menu', 'StandCrudController@edit_menu');
Route::get('stand/delete/{table}/{id}', 'StandCrudController@delete');
Route::post('stand/set_status', 'StandCrudController@set_status');

// CASHIER
Route::get('cashier', 'CashierController@index');
Route::get('cashier/order/{id_table}/{customer_name}', 'CashierController@order_detail');
Route::get('cashier/get/order/', 'CashierController@get_order');
Route::post('cashier/print', 'CashierController@print');

// LOGIN
Route::get('login', 'UserController@index');
Route::post('login/process', 'UserController@login_process');
Route::get('logout', 'UserController@logout');