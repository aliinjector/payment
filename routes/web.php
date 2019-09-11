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

Route::get('/docs', 'DocumentationController@index')->name('documentation');
Route::get('/', 'IndexController@index');

Auth::routes();

Route::namespace('Dashboard')->prefix('dashboard')->middleware('auth')->group(function () {
    Route::resource('index', 'DashboardController');
    Route::resource('UserInformation', 'UserInformationController');
    Route::post('melliUpload', 'UserInformationController@melliUpload')->name('melliUpload');
    Route::post('ShensnamehUpload', 'UserInformationController@ShensnamehUpload')->name('ShensnamehUpload');
    Route::resource('ticket', 'TicketController');
    Route::resource('setting', 'SettingController');
    Route::resource('card', 'CardController') ;
    Route::resource('wallet', 'WalletController');
    Route::resource('gateway', 'GatewayController');
    Route::resource('bill', 'BillController');
    Route::resource('chequeInquiry', 'CheckInquiryController');
    Route::resource('shop', 'ShopController');
    Route::resource('checkout', 'CheckoutController');
    Route::resource('product-list', 'ProductController');
    Route::post('product-list/storeProduct', 'ProductController@storeProduct')->name('Product.storeProduct');
    Route::post('product-list/storeFile', 'ProductController@storeFile')->name('Product.storeFile');
    Route::post('product-list/storeService', 'ProductController@storeService')->name('Product.storeService');
    Route::post('product-list/delete', 'ProductController@destroy')->name('Product.destroy');
    Route::resource('product-detail', 'ProductDetailController');
    Route::resource('product-category', 'ProductCategoryController');
    Route::resource('shop-setting', 'ShopSettingController');
    Route::put('shop-setting/update-contact/{id}', 'ShopSettingController@updateContact')->name('shop.setting.updateContact');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
});
