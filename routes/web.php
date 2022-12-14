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
        Route::prefix('staff')->name('staff.')->group(function() {
            Route::get('/', 'Admin\StaffController@index')->name('index');
            Route::post('/store', 'Admin\StaffController@store')->name('store');
            Route::get('/{id}/view', 'Admin\StaffController@view')->name('view');
            Route::post('/{id}/update', 'Admin\StaffController@update')->name('update');
            Route::get('/{id}/status', 'Admin\StaffController@status')->name('status');
            Route::get('/{id}/delete', 'Admin\StaffController@destroy')->name('delete');
        });
    });
});

Route::prefix('vendor')->name('vendor.')->group(function(){
    Route::middleware(['guest:vendor'])->group(function () {
        Route::get('/register', 'Vendor\HomeController@register')->name('register');
        Route::post('register/store', 'Vendor\HomeController@RegisterStore')->name('register.store');
        Route::view('login', 'vendor.auth.login')->name('login');
        Route::post('/check', 'Vendor\HomeController@loginCheck')->name('login.check');
    });

    Route::middleware(['auth:vendor'])->group(function(){
        Route::get('/home', 'Vendor\HomeController@home')->name('home');

        Route::get('/profile', 'Vendor\HomeController@profile')->name('profile');
        Route::post('password/check', 'Vendor\HomeController@passwordCheck')->name('password.check');
        Route::post('password/change', 'Vendor\HomeController@passwordChange')->name('password.change');
        Route::post('profile/store', 'Vendor\HomeController@ProfileStore')->name('profile.store');

    });
});





