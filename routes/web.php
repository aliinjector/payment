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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::namespace('Dashboard')->prefix('dashboard')->middleware('auth')->group(function () {
    Route::resource('index', 'DashboardController');
    Route::resource('UserInformation', 'UserInformationController');
    Route::resource('ticket', 'TicketController');
    Route::resource('setting', 'SettingController');
    Route::resource('card', 'CardController') ;
    Route::resource('wallet', 'WalletController');
    Route::resource('shop', 'ShopController');
    Route::resource('product-list', 'ProductController');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
});
