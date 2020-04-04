<?php

namespace App\Http\Controllers;

use App\Index;
use App\User;
use App\Shop;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        if(request()->getHost() === 'omidshop.net' OR request()->getHost() === '127.0.0.1' OR request()->getHost() === 'localhost'){
            $products = Product::orderBy('id', 'DESC')->limit(6)->get();
            $shops = Shop::orderBy('id', 'ASC')->limit(10)->get();
            return view('app.index', compact('products', 'shops'));
        }else{
            $shop = Shop::where('url', request()->getHost())->first();
            return \Redirect::to('/' . $shop->english_name);
        }
    }


    public function shopsShow()
    {
         $shops = Shop::orderBy('id', 'desc')->take(10)->get();
         return view('app.shops', compact('shops'));
    }




    public function shopsSearch()
    {
      return view('app.shops');
    }


        public function terms()
        {
          return view('app.terms');
        }


    public function productsShow()
    {
      $products = Product::orderBy('id', 'desc')->take(10)->paginate(10)->appends(request()->except('page', '_token'));
      return view('app.products', compact('products'));
    }



    public function productsSearch(Request $request)
    {
      $products = Product::where('title', 'like', '%' . $request->keyword . '%')->paginate(10)->appends(request()->except('page', '_token'));
      return view('app.products', compact('products'));
    }




}
