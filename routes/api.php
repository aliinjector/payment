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


Route::get('/paymentHelper', function(Request $request){
//    return $request->user();
    return \Auth::user()->with('cards.bank', 'wallets', 'gateways' , 'checkouts.card', 'checkouts.wallet')->get()->toArray();
})->middleware('auth:api');


//Route::namespace('Api')->middleware('auth')->group(function () {
Route::namespace('Api')->group(function () {
    Route::post('/login', 'AuthController@login');

    });

