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
            $products = Product::orderBy('id', 'DESC')->limit(8)->get();
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

        $sortBy = 'id';
        $orderBy = 'desc';
        $perPage = 20;
        $keyword = null;
        $minPrice = Product::all()->min('price');
        $maxPrice = Product::all()->max('price');;
        if ($request->has('orderBy')) $orderBy = $request->orderBy;
        if ($request->has('q')) $keyword = $request->keyword;
        if ($request->has('perPage')) $perPage = $request->perPage;
        if ($request->has('sortBy')) $sortBy = $request->sortBy;
        if ($request->has('minprice')) $minPrice = $request->minprice;
        if ($request->has('maxprice')) $maxPrice = $request->maxprice;

        // $products = Product::search($q)->orderBy($sortBy, $orderBy)->paginate(20)->appends(request()->except('page', '_token'));
        $products = Product::where('title', 'like', '%' . $request->keyword . '%')->where('status', 'enable')->where('price', '>' , $minPrice)->where('price', '<' , $maxPrice)->orderBy($sortBy, $orderBy)->paginate($perPage)->appends([request()->except('page', '_token') , 'sortBy' => $sortBy, 'orderBy' => $orderBy, 'perPage' => $perPage, 'minprice' => $minPrice, 'maxprice' => $maxPrice, 'keyword' => $keyword]);

        $minPriceProduct = $minPrice;
        $maxPriceProduct = $maxPrice;

        return view('app.products', compact('products', 'orderBy', 'sortBy', 'keyword', 'perPage', 'minPriceProduct', 'maxPriceProduct'));
    }




}
