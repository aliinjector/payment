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

        SEOTools::setTitle($shop->name . ' | ' . 'مقایسه محصولات');
        SEOTools::setDescription($shop->description);
        SEOTools::opengraph()->addProperty('type', 'website');

        return view('app.shop.compare', compact('shop', 'shopCategories'));

    }
}
