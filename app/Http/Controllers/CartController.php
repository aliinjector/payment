<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Shop;
use App\Product;
use App\CartProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return "hi";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($shop , $userID)
    {
      $shop = Shop::where('english_name' , $shop)->first();
      $shopCategories = $shop->ProductCategories()->get();
      if (\Auth::user()->cart()->get()->count() != 0) {
        $products = \Auth::user()->cart()->get()->first()->products();
        return view('app.cart', compact('shop','shopCategories','products'));
      }
      else {
        return view('app.cart', compact('shop','shopCategories'));
      }

    }

    public function purchaseList($shop , Request $request){

        if (\Auth::guest()) {
            return redirect()->route('register');
        }
        else{
            $cart = \Auth::user()->cart()->get()->first()->id;
            foreach(array_keys($request->except('_token')) as $productID){

                $quantity = DB::table('cart_product')->where([['cart_id', '=', $cart] , ['product_id', '=' , $productID]])->update([
                    'quantity' => $request->except('_token')[$productID],
                  ]);
            }
          $products = [];
          $productTotal_price = [];
          $productTotal_discount = [];
          $quantity = $request->all();
          foreach(array_keys($request->except('_token')) as $productID){
            $product = Product::where('id' , $productID)->get()->first();
            $products[] = $product;
            if ($product->off_price == null) {
                $productTotal_price[] = $product->price * $request->except('_token')[$product->id];
            }
            else{
                $productTotal_price[] = $product->off_price * $request->except('_token')[$product->id];
                $productTotal_discount[] = $product->price-$product->off_price;
            }
            $total_price = array_sum($productTotal_price);
            $productTotal_discounted = array_sum($productTotal_discount);
          }\
          array_shift($quantity);
            $shop = Shop::where('english_name' , $shop)->first();
            $shopCategories = $shop->ProductCategories()->get();
            return view('app.purchase-list', compact('shop','shopCategories','products','quantity','productTotal_price','total_price','productTotal_discounted'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
