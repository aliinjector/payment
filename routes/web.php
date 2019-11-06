<?php

use App\Events\UserRegistred;
use App\Listeners\SendUserRegistredSms;
use App\User;
use Illuminate\Http\Request;
use function foo\func;

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

Route::get('/docs', 'DocumentationController@index')->name('documentation');
Route::get('/', 'IndexController@index')->name('index');
Route::get('fast-pay/{id}', 'Dashboard\Payment\FastPayController@show')->name('fast-pay.show');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::get('/paymentHelper', function (Request $request) {
//    return $request->user();
    return User::find(1)->with('cards.bank', 'wallets', 'gateways', 'checkouts')->first();
});
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
        Route::resource('fast-pay', 'FastPayController');
        Route::get('fast-pay/delete/{id}', 'FastPayController@destroy')->name('fast-pay.delete');
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
        Route::put('product-list/change-status/{id}', 'ProductController@changeStatus')->name('change.status.product');
        Route::resource('product-detail', 'ProductDetailController');
        Route::resource('product-category', 'ProductCategoryController');
        Route::post('product-category/delete', 'ProductCategoryController@destroy');
        Route::resource('shop-setting', 'ShopSettingController');
        Route::put('shop-setting/update-contact/{id}', 'ShopSettingController@updateContact')->name('shop.setting.updateContact');
        Route::resource('vouchers', 'VoucherController');
        Route::post('vouchers/delete', 'VoucherController@destroy')->name('voucher.destroy');
        Route::post('vouchers/change-status/{id}', 'VoucherController@changeStatus')->name('change.status.voucher');

        //Comment
        Route::get('comment/notApproved', 'CommentController@notApproved')->name('comment.notApproved');
        Route::post('comment/delete', 'CommentController@destroy');
        Route::get('comment/approve/{id}/{commentable}', 'CommentController@approve')->name('comment.approve');
        Route::resource('comment', 'CommentController');

    });
});
Route::namespace('Shop')->middleware('auth')->group(function () {
    Route::any('/{shop}/purchase-list/{id}/voucher', 'ShopController@approved')->name('approved');
    Route::post('/{shop}/purchase-list/{cartID}/store', 'ShopController@purchaseSubmit')->name('purchase.submit');
    Route::any('/{shop}/purchase-list/{userID}', 'CartController@purchaseList')->name('purchaseList');
    Route::get('/user-purchased-list', 'ShopController@userPurchaseList')->name('user.purchased.list');
    Route::get('/{shop}/user-cart', 'CartController@show')->name('cart.show');
    Route::post('/{shop}/user-cart/{userID}/add', 'CartController@addToCart')->name('cart.add');
    Route::post('/user-cart/remove', 'CartController@removeFromCart')->name('cart.remove');
    Route::post('product-list/delete', 'ProductController@destroy')->name('Product.destroy');
    Route::get('/{shop}/{id}/file-download', 'ShopController@downlaodFile')->name('download.file');
    Route::get('/{shop}/file-download/{id}', 'ShopController@downlaodLink')->name('download.link');
    Route::patch('/{shop}/{id}/rate', 'ShopController@updateRate')->name('shop.rate');
});

Route::namespace('Shop')->group(function () {
    Route::get('/{shop}', 'ShopController@show')->name('show.shop');
    Route::get('/{shop}/{id}', 'ShopController@showProduct')->name('shop.show.product');
    Route::get('/{shop}/category/{categroyId}', 'ShopController@showCategory')->name('shop.show.category');
    Route::get('/{shop}/tag/{name}', 'ShopController@tagProduct')->name('shop.tag.product');

    //Comment
    Route::post('comment', 'CommentController@comment')->middleware('auth');
    Route::post('/comment/answer', 'CommentController@answer')->middleware('auth');

});
