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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', '\App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'web']], function () {
    Route::group(["namespace" => "BasicDefinitions"], function () {
        //UsersController
        Route::get('/users/index', '\App\Http\Controllers\BasicDefinitions\UsersController@index')->name('admin.users.index');
        Route::post('/users/store', '\App\Http\Controllers\BasicDefinitions\UsersController@store')->name('admin.users.store');

        //ProductsController
        Route::get('/product/index', '\App\Http\Controllers\BasicDefinitions\ProductsController@index')->name('admin.product.index');
        Route::post('/product/store', '\App\Http\Controllers\BasicDefinitions\ProductsController@store')->name('admin.product.store');

        //BrandsController
        Route::get('/brand/index', '\App\Http\Controllers\BasicDefinitions\BrandsController@index')->name('admin.brand.index');
        Route::post('/brand/store', '\App\Http\Controllers\BasicDefinitions\BrandsController@store')->name('admin.brand.store');

        //RoleController
        Route::get('/roles/index', '\App\Http\Controllers\BasicDefinitions\RoleController@index')->name('admin.role.index');
        Route::get('/roles/create', '\App\Http\Controllers\BasicDefinitions\RoleController@create')->name('admin.role.create');
        Route::post('/roles/store', '\App\Http\Controllers\BasicDefinitions\RoleController@store')->name('admin.role.store');



    });

    Route::group(["namespace" => "Pharmacy"], function () {
        //PharmacyController
        Route::get('/pharmacy/index', '\App\Http\Controllers\Pharmacy\PharmacyController@index')->name('admin.pharmacy.index');
        Route::post('/pharmacy/store', '\App\Http\Controllers\Pharmacy\PharmacyController@store')->name('admin.pharmacy.store');
        Route::get('/pharmacy/list', '\App\Http\Controllers\Pharmacy\PharmacyController@list_suppliers')->name('admin.pharmacy.list');


    });

    Route::group(["namespace" => "Suppliers"], function () {
        //SuppliersController
        Route::get('/suppliers/index', '\App\Http\Controllers\Suppliers\SuppliersController@index')->name('admin.suppliers.index');
        Route::post('/suppliers/store', '\App\Http\Controllers\Suppliers\SuppliersController@store')->name('admin.suppliers.store');
        Route::get('/suppliers/list', '\App\Http\Controllers\Suppliers\SuppliersController@list_order')->name('admin.suppliers.list');


    });


});
