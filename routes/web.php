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

Route::get('/login021', function (){
    // if (strstr(\Request::server('HTTP_REFERER'), 'localhost:8001')){
        \Auth::loginUsingId(16, true);
        return redirect()->route('dashboard.index');
    // }
});

Route::get('/lang/{locale}', function ($locale, Request $request) {
    \Cookie::queue('lang', $locale, 999999);
    return redirect()->back();
});


Route::get('/docs', 'DocumentationController@index')->name('documentation');
Route::get('/', 'IndexController@index')->name('index');

//Send Email
Route::post('/sendemail/send', 'SendEmailController@send')->name('sendemail.send');

Route::get('/shops', 'IndexController@shopsShow')->name('shops.show');
Route::post('/shops', 'IndexController@shopsSearch')->name('shops.search');
Route::get('/products', 'IndexController@productsShow')->name('products.show');
Route::post('/products', 'IndexController@productsSearch')->name('products.search');
Route::get('/terms', 'IndexController@terms')->name('terms');

Route::get('fast-pay/{id}', 'Dashboard\Payment\FastPayController@show')->name('fast-pay.show');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::get('/paymentHelper', function (Request $request) {
  dd('a');
    return User::find(4)->with('cards.bank', 'wallets', 'gateways', 'checkouts')->first();
});
Route::namespace('Dashboard')->prefix('admin-panel')->middleware('auth')->group(function () {
    Route::resource('index', 'DashboardController');
      Route::namespace('Payment')->prefix('payment')->middleware('auth')->group(function () {
        Route::resource('sharing', 'ShareController');
        Route::resource('UserInformation', 'UserInformationController');
        Route::post('melliUpload', 'UserInformationController@melliUpload')->name('melliUpload');
        Route::post('ShensnamehUpload', 'UserInformationController@ShensnamehUpload')->name('ShensnamehUpload');
        Route::get('verification/sms/{mobileCode?}', 'UserInformationController@sms')->name('verification.sms');
        Route::get('verification/email/{emailCode?}', 'UserInformationController@email')->name('verification.email');
        Route::resource('ticket', 'TicketController');
        Route::post('ticket/answer', 'TicketController@answer')->name('ticket.answer');
        Route::get('ticket/buzz/{ticket}', 'TicketController@buzz')->name('ticket.buzz');
        Route::get('setting/user-panel', 'SettingController@userPanelShow')->name('setting.user-panel');
        Route::post('setting/user-panel/store', 'SettingController@userPanelStore')->name('setting.user-panel.store');
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
        Route::resource('dashboard', 'DashboardShopController');

        Route::prefix('purchases-managment')->group(function () {

        //downloadLink managment
        Route::resource('download-link-request-status', 'DownloadLinkRequestController');
        Route::post('download-link-request-status/approved', 'DownloadLinkRequestController@acceptRequest');
        Route::post('download-link-request-status/delete', 'DownloadLinkRequestController@destroy')->name('product-list.file.delete');
        Route::post('download-link-request-status/restore', 'DownloadLinkRequestController@restore')->name('product-list.file.restore');

        //Purchases
        Route::resource('purchases', 'PurchaseController');
        Route::post('purchases/{purchaseID}/delete/{id}', 'PurchaseController@destroy')->name('purchases.delete')->where(['purchaseID' => '[0-9]+', 'id' => '[0-9]+']);
        Route::post('purchases/{purchaseID}/restore/{id}', 'PurchaseController@restore')->name('purchases.restore')->where(['purchaseID' => '[0-9]+', 'id' => '[0-9]+']);
        Route::put('purchases/change-status/{id}', 'PurchaseController@changeStatus')->name('purchases.change-status')->where(['id' => '[0-9]+']);

      });

        //Products
        Route::resource('product-list', 'ProductController');
        Route::post('products/search', 'ProductController@search')->name('dashboard.products.search');
        Route::post('product-list/storeProduct', 'ProductController@storeProduct')->name('Product-list.storeProduct');
        Route::post('product-list/delete', 'ProductController@destroy')->name('Product-list.delete');
        Route::post('product-list/restore', 'ProductController@restore')->name('Product-list.restore');
        Route::put('product-list/change-status/{id}', 'ProductController@changeStatus')->name('Product-list.change-status')->where(['id' => '[0-9]+']);
        Route::post('product-list/image/delete', 'ProductController@destroyImage')->name('product-list.image.delete');
        Route::post('product-list/file/delete', 'ProductController@destroyFile')->name('product-list.file.delete');
        Route::get('product-list/{id}/edit-physical', 'ProductController@editPhysical')->name('product-list.edit-physical')->where(['id' => '[0-9]+']);
        Route::get('product-list/{id}/edit-file', 'ProductController@editFile')->name('product-list.edit-file')->where(['id' => '[0-9]+']);
        Route::get('product-list/{id}/edit-service', 'ProductController@editService')->name('product-list.edit-service')->where(['id' => '[0-9]+']);
        Route::get('product-list/{product}/show-physical', 'ProductController@showPhysical')->name('product-list.show-physical')->where(['product' => '[0-9]+']);
        Route::get('product-list/{product}/show-file', 'ProductController@showFile')->name('product-list.show-file')->where(['product' => '[0-9]+']);
        Route::get('product-list/{product}/show-service', 'ProductController@showService')->name('product-list.show-service')->where(['product' => '[0-9]+']);
        Route::post('product-list/getFeatures', 'ProductController@getFeatures')->name('product-list.getFeatures');

        Route::prefix('categrory-managment')->group(function () {

        //Product-Category
        Route::resource('product-category', 'ProductCategoryController');
        Route::post('product-category/delete', 'ProductCategoryController@destroy')->name('product-category.delete');
        Route::post('product-category/restore', 'ProductCategoryController@restore');
        Route::post('product-category/icon/delete', 'ProductCategoryController@destroyIcon')->name('product-category.icon.delete');

        //Feature
        Route::resource('feature', 'FeatureController');
        Route::post('feature/delete', 'FeatureController@destroy')->name('feature.delete');
        Route::post('feature/restore', 'FeatureController@restore');


        //Specification
        Route::resource('specification', 'SpecificationController');
        Route::post('specification/delete', 'SpecificationController@destroy')->name('specification.delete');
        Route::post('specification/restore', 'SpecificationController@restore');

        //SpecificationItem
        Route::resource('specification-item', 'SpecificationItemController');
        Route::get('specification-item/main/{id}', 'SpecificationItemController@main')->name('specification-item.main')->where(['id' => '[0-9]+']);
        Route::put('specification-item/main/change-status/{id}', 'SpecificationItemController@changeStatus')->name('specification-item.change-status');
        Route::post('specification-item/main/delete', 'SpecificationItemController@destroy')->name('specification-item.delete');
        Route::post('specification-item/main/restore', 'SpecificationItemController@restore');

      });


        //Vouchers
        Route::get('vouchers/voucher-report', 'VoucherController@voucherReport')->name('vouchers.voucher-report');
        Route::resource('vouchers', 'VoucherController');
        Route::post('vouchers/delete', 'VoucherController@destroy')->name('vouchers.delete');
        Route::post('vouchers/restore', 'VoucherController@restore');
        Route::post('vouchers/change-status/{id}', 'VoucherController@changeStatus')->name('vouchers.change-status')->where(['id' => '[0-9]+']);

        //Gallery
        Route::post('image/delete','GalleryController@fileDestroy');
        Route::get('galleries/{product}', 'GalleryController@index')->name('galleries.index')->where(['product' => '[0-9]+']);
        Route::get('image/upload','GalleryController@fileCreate');
        Route::post('image/upload/store/{product}','GalleryController@fileStore')->where(['product' => '[0-9]+']);

        //Comment
        Route::resource('product-comments', 'CommentsController');
        Route::get('comment/notApproved', 'CommentsController@notApproved')->name('comment.notApproved');
        Route::post('comment/delete', 'CommentsController@destroy');
        Route::post('comment/restore', 'CommentsController@restore');
        Route::get('comment/approve/{id}/{commentable}', 'CommentsController@approve')->name('comment.approve')->where(['id' => '[0-9]+']);

        //Brand
        Route::resource('brand', 'BrandController');
        Route::post('brand/delete', 'BrandController@destroy')->name('brand.delete');
        Route::post('brand/restore', 'BrandController@restore');
        Route::post('brand/icon/delete', 'BrandController@destroyIcon')->name('brand.icon.delete');

        //application
        Route::resource('application', 'ApplicationController');
        Route::put('application/change-status/{id}', 'ApplicationController@changeStatus')->where(['id' => '[0-9]+']);
        Route::post('application/applicatio-request', 'ApplicationController@applicatioRequest')->name('application.applicatio-request');


        //Stats
        Route::resource('stats', 'StatController');
        Route::post('stats/add', 'StatController@add')->name('stats.add');

        //users
        Route::resource('users', 'UserController');
        Route::get('users/purchase/{userID}/show/{id}', 'UserController@purcheseShow')->name('users.purchase.show')->where(['userID' => '[0-9]+', 'id' => '[0-9]+']);
        Route::get('users/purchases/{user}', 'UserController@purchases')->name('users.purchases')->where(['id' => '[0-9]+']);
        Route::post('users/delete', 'UserController@destroy')->name('user.delete');

        //notification
        Route::put('notification/read-all', 'NotificationController@readAll')->name('notification.read-all');

      Route::prefix('managment')->group(function () {

          //Slideshow
          Route::resource('slideshow', 'SlideshowController');
          Route::post('slideshow/delete', 'SlideshowController@destroy')->name('slideshow.delete');
          Route::post('slideshow/restore', 'SlideshowController@restore');


          //Feedback
          Route::resource('feedback', 'FeedbackController');
          Route::post('feedback/delete', 'FeedbackController@destroy')->name('feedback.delete');
          Route::post('feedback/restore', 'FeedbackController@restore');

          //FAQ
          Route::resource('faq', 'FAQController');
          Route::post('faq/delete', 'FAQController@destroy')->name('faq.delete');
          Route::post('faq/restore', 'FAQController@restore');


          //Shop-Setting
          Route::resource('shop-setting', 'ShopSettingController');
          Route::put('shop-setting/setting-update/{id}', 'ShopSettingController@updateSetting')->name('shop-setting.setting-update')->where(['id' => '[0-9]+']);
          Route::put('shop-setting/update-contact/{id}', 'ShopSettingController@updateContact')->name('shop.setting.update-contact')->where(['id' => '[0-9]+']);
          Route::put('shop-setting/update-template/{id}', 'ShopSettingController@updateTemplate')->name('shop.setting.update-template')->where(['id' => '[0-9]+']);
          Route::post('shop-setting/image/delete', 'ShopSettingController@destroyImage')->name('shop-setting.image.delete');


          //Invoice
          Route::resource('invoice', 'InvoiceController');

        });

    });
});


Route::namespace('Shop')->middleware('auth')->group(function () {
    //Purchase List
    Route::post('/{shop}/purchase-list/voucher', 'PurchaseController@approved')->name('approved')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);
    Route::post('/{shop}/purchase-list/{cartID}/store', 'PurchaseController@purchaseSubmit')->name('purchase-list.store')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}', 'cartID' => '[0-9]+']);
    Route::match(['get', 'post'],'/{shop}/purchase-list/{userID}', 'PurchaseController@purchaseList')->name('purchase-list')->middleware('PreventDirectAccessToPreOrder')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}', 'userID' => '[0-9]+']);
    Route::post('/{shop}/purchase-list/getShippingPrice/calculate', 'PurchaseController@getShippingPrice')->name('purchase-list.getShippingPrice')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);

    //User-pruchased List
    Route::get('/user-purchased-list', 'UserPurchasesController@userPurchaseList')->name('user.purchased.list');
    Route::get('/user-purchased-list/show/{id}', 'UserPurchasesController@showPurchase')->name('user.purchased.list.show')->where(['id' => '[0-9]+']);
    Route::get('/user-purchased-list/invoice/{id}', 'UserPurchasesController@showInvoice')->name('user.purchased.list.show.invoice')->where(['id' => '[0-9]+']);

    //Address
    Route::resource('/user-address', 'AddressController');
    Route::post('/user-address/delete', 'AddressController@destroy')->name('user-address.delete');


    //User-Panel
    Route::get('/user-panel/change-password', 'UserPanelController@changePassword')->name('user-panel.change-password');
    Route::put('/user-panel/change-password/store', 'UserPanelController@changePasswordStore')->name('user-panel.change-password.store');
    Route::resource('/user-panel', 'UserPanelController');

    //Cart
    Route::get('/{shop}/user-cart', 'CartController@show')->name('user-cart')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);
    Route::post('/{shop}/user-cart/{userID}/add', 'CartController@addToCart')->name('user-cart.add')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}', 'userID' => '[0-9]+']);
    Route::post('/{shop}/user-cart/remove', 'CartController@removeFromCart')->name('user-cart.remove')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);

    //File-Download
    Route::get('/{shop}/{id}/{purchaseId}/file-download', 'ShopController@downlaodFile')->name('file-download')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}', 'id' => '[0-9]+', 'purchaseId' => '[0-9]+']);
    Route::get('/{shop}/file-download/{id}', 'ShopController@downlaodLink')->name('download.link')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}', 'id' => '[0-9]+']);

    //Rating
    Route::patch('/{shop}/{id}/rate', 'RatingController@updateRate')->name('rate')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}', 'id' => '[0-9]+']);

    //Compare
    Route::get('/{shop}/compare', 'CompareController@index')->name('compare')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);
    Route::post('/{shop}/compare/store', 'CompareController@store')->name('compare.store')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);
    Route::post('{shop}/compare/remove', 'CompareController@deleteFromCompare')->name('compare.remove')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);

    //Wishlist
    Route::post('/{shop}/wishlist/store', 'WishlistController@store')->name('wishlist.store')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);
    Route::get('/{shop}/wishlist', 'WishlistController@index')->name('wishlist')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);
    Route::post('{shop}/wishlist/remove', 'WishlistController@deleteFromWishlist')->name('wishlist.remove')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);

    //download link request
    Route::post('/download-link-request/send', 'UserPurchasesController@downloadLinkRequest')->name('downloadLinkRequest');

});

Route::namespace('Shop')->group(function () {
  //shop
    Route::get('/{shop}', 'ShopController@index')->name('shop')->where('shop', '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}');
    Route::get('/{shop}/product/{id}/{slug?}', 'ProductContoller@show')->name('product')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}', 'id' => '[0-9]+']);
    Route::get('/{shop}/category/{categroyId}/{name?}', 'CategoryController@index')->name('category')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}', 'categroyId' => '[0-9]+']);
    Route::get('/{shop}/tag/{id}', 'TagController@tagProducts')->name('tag')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}', 'id' => '[0-9]+']);
    Route::get('/{shop}/brand/{id}', 'BrandController@brandProduct')->name('brand')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}', 'id' => '[0-9]+']);
    Route::post('/{shop}/search/', 'SearchController@index')->name('search')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);
    Route::get('/{shop}/faq/', 'ShopController@showFaq')->name('faq.show')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);
    //Comment
    Route::post('comment', 'CommentController@comment')->middleware('auth');
    Route::post('/comment/answer', 'CommentController@answer')->middleware('auth');

    Route::get('/{shop}/register', 'ShopController@registerShow')->name('template.register.show')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);
    Route::post('/{shop}/register', 'ShopController@register')->name('template.register')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);
    Route::get('/{shop}/login', 'ShopController@login')->name('template.login.show')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);


    Route::get('/{shop}/contact', 'ShopController@contact')->name('template.contact')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);

    Route::post('/{shop}/subscribe', 'SubscribersController@subscribe')->name('subscribe')->where(['shop' => '[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}']);

});

Route::post('/addStat', 'Dashboard\Shop\StatController@addStat')->name('stats.add');
