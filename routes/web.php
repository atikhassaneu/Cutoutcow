<?php

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/user','Auth\UserController@index')->name('user');
Route::get('login/facebook', 'Auth\LoginController@facebookRedirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@facebookHandleProviderCallback');


Route::get('login/twitter', 'Auth\LoginController@twitterRedirectToProvider');
Route::get('login/twitter/callback', 'Auth\LoginController@twitterHandleProviderCallback');

Route::get('login/linkedin', 'Auth\LoginController@linkedInRedirectToProvider');
Route::get('login/linkedin/callback', 'Auth\LoginController@linkedInHandleProviderCallback');



Route::get('/home', 'HomeController@index')->name('home');


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function (){
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/order','OrderController@index')->name('order');
    Route::get('/picture-rate','PictureRateController@index')->name('picture-rate.index');
    Route::post('/picture-rate/update','PictureRateController@update')->name('picture-rate.update');
    Route::resource('/make-admin','MakeAdminController');
    Route::get('/change-password','ChangePasswordController@index')->name('change-password.index');
    Route::put('/update-password','ChangePasswordController@update')->name('change-password.update');
});

Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function (){
    Route::get('/dashboard','DashboardController@index')->name('dashboard.index');
    Route::get('/change-password','ChangePasswordController@index')->name('change-password.index');
    Route::put('/update-password','ChangePasswordController@update')->name('change-password.update');
    Route::get('/account','AccountController@index')->name('account.index');
    Route::put('/account-update','AccountController@update')->name('account.update');
    Route::put('/invoice-update','InvoiceController@update')->name('invoice.update');
    Route::get('/overview','OrderController@overview')->name('overview.index');
    Route::get('/new-order','OrderController@newOrder')->name('new-order.index');
    Route::get('/order-view/{id}','OrderController@view')->name('order.view');
    Route::delete('/order-delete/{id}','OrderController@destroy')->name('order.delete');

    Route::post('/image-upload','OrderController@imageUpload')->name('image-upload');
});