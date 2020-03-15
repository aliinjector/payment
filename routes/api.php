<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::get('/paymentHelper', function(Request $request){
//    return \Auth::user()->with('cards.bank', 'wallets', 'gateways' , 'checkouts.card', 'checkouts.wallet')->get()->toArray();
//})->middleware('auth:api');


Route::namespace('Api')->group(function () {
    Route::post('/login', 'AuthController@login');
    Route::get('/user/{api_token}', 'AuthController@user');



    Route::get('/paymentHelper/checkouts/{user_id}', function (Request $request) {
        $checkouts = \App\Checkout::with('card','wallet')->where('user_id', $request->user_id)->get();
        return \Response::json($checkouts);
    });



    Route::get('/products/{shop_id}', function (Request $request) {
        $products = \App\Product::where('shop_id', $request->shop_id)->limit(1000)->get();
        return \Response::json($products);
    });

    Route::get('/products/category/{shop_id}/{category_id}', function (Request $request) {
        $products = \App\Product::where('shop_id', $request->shop_id)->where('productCat_id', $request->category_id)->limit(1000)->get();
        return \Response::json($products);
    });

    Route::get('/product/{product_id}', function (Request $request) {
        $product = \App\Product::where('id', $request->product_id)->first();
        return \Response::json($product);
    });

    Route::post('/search', function (Request $request) {
        $products = \App\Product::search($request->queryy)->where('shop_id', $request->shop_id)->get();
        return \Response::json($products);
    });

    Route::post('/search/category', function (Request $request) {
        $products = \App\Product::search($request->queryy)->where('shop_id', $request->shop_id)->where('productCat_id', $request->category_id)->get();
        return \Response::json($products);
    });



    Route::get('/categories/{shop_id}', function (Request $request) {
        $categories = \App\ProductCategory::with('children')->where('shop_id', $request->shop_id)->where('parent_id', null)->get();
        return \Response::json($categories);
    });

    Route::get('/purchases/{user_id}', function (Request $request) {
        $purchases = \App\UserPurchase::where('user_id', $request->user_id)->first();
        return \Response::json($purchases);
    });


});


