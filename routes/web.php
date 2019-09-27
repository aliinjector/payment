<?php
use Illuminate\Http\Request;

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
Auth::routes();

// Route::get('/docs', 'DocumentationController@index')->name('documentation');
// if (! $request->hasValidSignature()) {
//     abort(401);
// }

Route::get('/docs', 'DocumentationController@index')->name('documentation');


Route::get('/', 'IndexController@index');



Route::namespace('Dashboard')->prefix('dashboard')->middleware('auth')->group(function () {
    Route::resource('index', 'DashboardController');

    Route::namespace('Payment')->prefix('payment')->middleware('auth')->group(function () {
        Route::resource('UserInformation', 'UserInformationController');
        Route::post('melliUpload', 'UserInformationController@melliUpload')->name('melliUpload');
        Route::post('ShensnamehUpload', 'UserInformationController@ShensnamehUpload')->name('ShensnamehUpload');
        Route::resource('ticket', 'TicketController');
        Route::resource('setting', 'SettingController');
        Route::resource('card', 'CardController');
        Route::get('card/delete/{id}', 'CardController@destroy')->name('card.delete');
        Route::resource('wallet', 'WalletController');
        Route::get('wallet/delete/{id}', 'WalletController@destroy')->name('wallet.delete');
        Route::resource('gateway', 'GatewayController');
        Route::get('gateway/delete/{id}', 'GatewayController@destroy')->name('gateway.delete');
        Route::resource('bill', 'BillController');
        Route::resource('chequeInquiry', 'CheckInquiryController');
        Route::resource('checkout', 'CheckoutController');
        Route::resource('tpg', 'TPGController');
        Route::get('transactionReport/wallet/{wallet}', 'TransactionReportController@walletReport')->name('transactionReport.wallet');
        Route::get('transactionReport/gateway/{gateway}', 'TransactionReportController@gatewayReport')->name('transactionReport.gateway');
    });

    Route::namespace('Shop')->prefix('shop')->middleware('auth')->group(function () {
        Route::resource('dashboard-shop', 'DashboardShopController');
        Route::get('purchase-status', 'DashboardShopController@purchaseStatus')->name('purchase.status');
        Route::resource('product-list', 'ProductController');
        Route::post('product-list/storeProduct', 'ProductController@storeProduct')->name('Product.storeProduct');
        Route::post('product-list/delete', 'ProductController@destroy')->name('Product.destroy');
        Route::put('product-list/change-status/status/{id}', 'ProductController@changeStatus')->name('change.status.product');
        Route::resource('product-detail', 'ProductDetailController');
        Route::resource('product-category', 'ProductCategoryController');
        Route::post('product-category/delete', 'ProductCategoryController@destroy');
        Route::resource('shop-setting', 'ShopSettingController');
        Route::put('shop-setting/update-contact/{id}', 'ShopSettingController@updateContact')->name('shop.setting.updateContact');
    });

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
});
Route::get('/{shop}/purchase-success/{id}', 'ShopController@purchaseSuccess')->name('purchaseSuccess');
Route::get('/file-download', 'ShopController@test');
Route::get('/{shop}', 'ShopController@show')->name('show.shop');
Route::get('/{shop}/{id}/file-download', 'ShopController@downlaodFile')->name('download.file');
Route::get('/{shop}/file-download/{id}', 'ShopController@downlaodLink')->name('download.link');
Route::get('/{shop}/{id}', 'ShopController@showProduct')->name('shop.show.product');
Route::get('/{shop}/category/{categroyId}', 'ShopController@showCategory')->name('shop.show.category');


