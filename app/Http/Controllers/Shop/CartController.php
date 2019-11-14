<?php

namespace App\Http\Controllers\Shop;

use App\Cart;
use App\Shop;
use App\Product;
use App\CartProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Request as RequestFacade;
class CartController extends \App\Http\Controllers\Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($shop) {
        $shop = Shop::where('english_name', $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        if (\Auth::user()->cart()->get()->count() != 0) {
            $products = \Auth::user()->cart()->get()->first()->products();
            return view('app.shop.cart', compact('shop', 'shopCategories', 'products'));
        } else {
            return view('app.shop.cart', compact('shop', 'shopCategories'));
        }
    }
    public function purchaseList($shop, Request $request) {
      $cart = \Auth::user()->cart()->get()->first()->id;
      $productsID = [];
      foreach(DB::table('cart_product')->where('cart_id', '=', $cart)->get() as $a){
        $productsID[] = $a->product_id;
      }
        if (\Auth::guest()) {
            return redirect()->route('register');
        } else {
            $cart = \Auth::user()->cart()->get()->first()->id;
            foreach ($productsID as $productID) {
              if (Product::where('id', $productID)->get()->first()->off_price == null) {
                $singleProductPrice = Product::where('id', $productID)->get()->first()->price;
              }
              else{
                $singleProductPrice = Product::where('id', $productID)->get()->first()->off_price;
              }

              if(RequestFacade::server('HTTP_REFERER') !== route('purchaseList',['shop'=>$shop, 'userID' => \Auth::user()->id])){
                  $quantity = DB::table('cart_product')->where([['cart_id', '=', $cart], ['product_id', '=', $productID]])->update(['quantity' => $request->except('_token') [$productID], 'total_price' => $singleProductPrice * $request->except('_token') [$productID]]);
              }
            }
            $total_price = \Auth::user()->cart()->get()->first()->total_price;
            $cart = \Auth::user()->cart()->get()->first()->id;
            $productsID = [];
            $quantity = [];
            $productTotal_price = [];
            foreach(DB::table('cart_product')->where('cart_id', '=', $cart)->get() as $a){
             $productsID[] = $a->product_id;
             $quantity[] = $a->quantity;
             $productTotal_price[] = $a->total_price;
            }
           $products = [];
           foreach ($productsID as $productID) {
               $product = Product::where('id', $productID)->get()->first();
               $products[] = $product;
           }
                $total_price = array_sum($productTotal_price);
                $cartUpdate = \Auth::user()->cart()->get()->first()->update([
                'total_price' => $total_price,
                ]);
            $shop = Shop::where('english_name', $shop)->first();
            $shopCategories = $shop->ProductCategories()->get();
            return view('app.shop.purchase-list', compact('shop', 'shopCategories', 'products', 'quantity', 'productTotal_price','total_price'));
        }
    }
    public function addToCart($shop, $userID, Request $request) {
        if (\Auth::user()->cart()->count() == 0) {
            $cart = new Cart;
            $cart->user_id = \Auth::user()->id;
            $cart->shop_id = Shop::where('english_name', $shop)->first()->id;
            $cart->status = 0;
            $cart->save();
        }
        $cartProduct = DB::table('cart_product')->where('product_id', '=', $request->product_id)->where('cart_id', '=', \Auth::user()->cart()->get()->first()->id)->first();
        $userCartShopID = \Auth::user()->cart()->get()->first()->shop_id;
        $currentshopID = Shop::where('english_name' , $shop)->get()->first()->id;
        if (is_null($cartProduct) and $userCartShopID == $currentshopID) {
            DB::table('cart_product')->insert([['product_id' => $request->product_id, 'cart_id' => \Auth::user()->cart()->get()->first()->id], ]);
            toastr()->success('افزوده شد.', '');

            return redirect()->back();
        } else {
            alert()->error('محصول از قبل در سبد خرید شما وجود دارد و یا محصول متعلق به یک فروشگاه نمیباشد', 'خطا');
            return redirect()->back();
        }
    }


    public function removeFromCart(Request $request){
        DB::table('cart_product')->where('product_id', '=', $request->id)->where('cart_id', '=', $request->cart)->delete();
        if(is_null(DB::table('cart_product')->where('cart_id', '=', \Auth::user()->cart()->get()->first()->id)->first())) {
          Cart::where('id', \Auth::user()->cart()->get()->first()->id)->get()->first()->delete();
        }
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart) {
        //

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart) {
        //

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart) {
        //

    }
}
