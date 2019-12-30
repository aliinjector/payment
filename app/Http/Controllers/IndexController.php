<?php

namespace App\Http\Controllers;

use App\Index;
use App\User;
use App\Shop;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        return view('app.index');
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
      $products = Product::orderBy('id', 'desc')->take(10)->get();
      return view('app.products', compact('products'));
    }



    public function productsSearch(Request $request)
    {
      $products = Product::search(trim($request->queryy))->get();
      $queryy = $request->queryy;
      return view('app.products', compact('products', 'queryy'));
    }




}
