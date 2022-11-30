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
    return view('welcome');
});

Auth::routes();

// Admin Panel Route

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function() {
        Route::view('/login', 'admin.auth.login')->name('home');
        Route::post('/check', 'Admin\AdminController@check')->name('login.check');
    });
    Route::middleware(['auth:admin'])->group(function() {
        Route::get('/home', 'Admin\AdminController@home')->name('home');


        // Vendors
        Route::prefix('vendor')->name('vendor.')->group(function() {
            Route::get('/', 'Admin\VendorController@index')->name('index');
            Route::post('/store', 'Admin\VendorController@store')->name('store');
            Route::get('/{id}/view', 'Admin\VendorController@view')->name('view');
            Route::post('/{id}/update', 'Admin\VendorController@update')->name('update');
            Route::get('/{id}/status', 'Admin\VendorController@status')->name('status');
            Route::get('/{id}/delete', 'Admin\VendorController@destroy')->name('delete');
        });
        // Staff
        // Route::prefix('vendor')->name('vendor.')->group(function() {
        //     Route::get('/', 'Admin\VendorController@index')->name('index');
        //     Route::post('/store', 'Admin\VendorController@store')->name('store');
        //     Route::get('/{id}/view', 'Admin\VendorController@view')->name('view');
        //     Route::post('/{id}/update', 'Admin\VendorController@update')->name('update');
        //     Route::get('/{id}/status', 'Admin\VendorController@status')->name('status');
        //     Route::get('/{id}/delete', 'Admin\VendorController@destroy')->name('delete');
        // });
    });
});





