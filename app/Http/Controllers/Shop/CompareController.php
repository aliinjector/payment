<?php

namespace App\Http\Controllers\Shop;

use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class CompareController extends \App\Http\Controllers\Controller
{
    public function index($shop)
    {

        if (Shop::where('english_name', $shop)->first() == null) {
            return abort(404);
        }
        $shopCategories = Shop::where('english_name', $shop)->first()->ProductCategories()->get();
        $shop = Shop::where('english_name', $shop)->first();
        toastr()->info('محصولات اضافه شدند.');
        return view('app.shop.compare', compact('shop', 'lastProducts', 'shopCategories'));

    }
}
