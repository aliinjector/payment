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
        //Shop Dashboard
        Route::resource('dashboard-shop', 'DashboardShopController');
        //Purchase Status
        Route::get('purchase-status', 'DashboardShopController@purchaseStatus')->name('purchase.status');
        //Products
        Route::resource('product-list', 'ProductController');
        Route::post('product-list/storeProduct', 'ProductController@storeProduct')->name('Product-list.storeProduct');
        Route::post('product-list/delete', 'ProductController@destroy')->name('Product-list.delete');
        Route::put('product-list/change-status/{id}', 'ProductController@changeStatus')->name('Product-list.change-status');
        //Product-Category
        Route::resource('product-category', 'ProductCategoryController');
        Route::post('product-category/delete', 'ProductCategoryController@destroy')->name('product-category.delete');
        //Shop-Setting
        Route::resource('shop-setting', 'ShopSettingController');
        Route::put('shop-setting/setting-update/{id}', 'ShopSettingController@updateSetting')->name('shop-setting.setting-update');
        Route::put('shop-setting/update-contact/{id}', 'ShopSettingController@updateContact')->name('shop.setting.update-contact');
        //Vouchers
        Route::get('vouchers/voucher-report', 'VoucherController@voucherReport')->name('vouchers.voucher-report');
        Route::resource('vouchers', 'VoucherController');
        Route::post('vouchers/delete', 'VoucherController@destroy')->name('vouchers.delete');
        Route::post('vouchers/change-status/{id}', 'VoucherController@changeStatus')->name('vouchers.change-status');
        //Gallery
        Route::post('image/delete','GalleryController@fileDestroy');
        Route::get('galleries/{product}', 'GalleryController@index')->name('galleries.index');
        Route::get('image/upload','GalleryController@fileCreate');
        Route::post('image/upload/store/{product}','GalleryController@fileStore');
        //Comment
        Route::resource('product-comments', 'CommentsController');
        Route::get('comment/notApproved', 'CommentsController@notApproved')->name('comment.notApproved');
        Route::post('comment/delete', 'CommentsController@destroy');
        Route::get('comment/approve/{id}/{commentable}', 'CommentsController@approve')->name('comment.approve');
        //Brand
        Route::resource('brand', 'BrandController');
        Route::post('brand/delete', 'BrandController@destroy')->name('brand.delete');
        //Feedback
        Route::resource('feedback', 'FeedbackController');
        Route::post('feedback/delete', 'FeedbackController@destroy')->name('feedback.delete');
    });
});
Route::namespace('Shop')->middleware('auth')->group(function () {
    //Purchase (invoice)
    Route::any('/{shop}/purchase-list/{id}/voucher', 'ShopController@approved')->name('approved');
    Route::post('/{shop}/purchase-list/{cartID}/store', 'ShopController@purchaseSubmit')->name('purchase-list.store');
    Route::any('/{shop}/purchase-list/{userID}', 'CartController@purchaseList')->name('purchase-list');
    //User-pruchased List
    Route::get('/user-purchased-list', 'ShopController@userPurchaseList')->name('user.purchased.list');
    //Cart
    Route::get('/{shop}/user-cart', 'CartController@show')->name('user-cart');
    Route::post('/{shop}/user-cart/{userID}/add', 'CartController@addToCart')->name('user-cart.add');
    Route::post('/user-cart/remove', 'CartController@removeFromCart')->name('user-cart.remove');
    //File-Download
    Route::get('/{shop}/{id}/file-download', 'ShopController@downlaodFile')->name('file-download');
    Route::get('/{shop}/file-download/{id}', 'ShopController@downlaodLink')->name('download.link');
    //Rating
    Route::patch('/{shop}/{id}/rate', 'ShopController@updateRate')->name('rate');
    //Compare
    Route::get('/{shop}/compare', 'CompareController@index')->name('compare');

});

Route::namespace('Shop')->group(function () {
  //shop
    Route::get('/{shop}', 'ShopController@index')->name('shop');
    Route::get('/{shop}/product/{id}', 'ProductContoller@show')->name('product');
    Route::get('/{shop}/category/{categroyId}', 'CategoryController@index')->name('category');
    Route::get('/{shop}/tag/{name}', 'ShopController@tagProduct')->name('tag');
    //Comment
    Route::post('comment', 'CommentController@comment')->middleware('auth');
    Route::post('/comment/answer', 'CommentController@answer')->middleware('auth');

});
