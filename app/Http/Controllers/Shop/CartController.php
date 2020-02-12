<?php

namespace App\Http\Controllers\Shop;

use App\Cart;
use App\Shop;
use App\Product;
use App\CartProduct;
use App\Http\Requests\CartRequest;
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
    public function store(CartRequest $request) {
        //

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($shopName) {
        $shop = Shop::where('english_name', $shopName)->first();
        $cart = \Auth::user()->cart()->get()->first();
        $shopCategories = $shop->ProductCategories()->get();
        $template_folderName = $shop->template->folderName;
        if (\Auth::user()->cart()->get()->count() != 0) {
            $products = \Auth::user()->cart()->get()->first()->products();
            return view("app.shop.$template_folderName.cart", compact('shop', 'shopCategories', 'products','cart'));
        } else {
            return view("app.shop.$template_folderName.cart", compact('shop', 'shopCategories'));
        }
    }

    public function addToCart($shopName, $userID, CartRequest $request) {
      $product = Product::where('id', $request->product_id)->get()->first();
      if($product->specifications()->where('type', 'radio')->count() != 0 and !isset($request->specification)){
        return redirect()->back()->withErrors(['باید خصوصیت تک انتخابی کالا انتخاب شود']);
      }
        if (\Auth::user()->cart()->count() == 0) {
            $cart = new Cart;
            $cart->user_id = \Auth::user()->id;
            $cart->shop_id = Shop::where('english_name', $shopName)->first()->id;
            $cart->status = 0;
            $cart->save();
        }
        $cartProduct = DB::table('cart_product')->where('product_id', '=', $request->product_id)->where('cart_id', '=', \Auth::user()->cart()->get()->first()->id)->where('color_id', '=', $request->color)->where('specification', '=', \json_encode($request->specification))->first();
        $userCartShopID = \Auth::user()->cart()->get()->first()->shop_id;
        $currentshopID = Shop::where('english_name' , $shopName)->get()->first()->id;
        if($product->off_price != null){
          $productPrice = $product->off_price;
        }else{
          $productPrice = $product->price;
        }
        if($request->quantity == null){
          $request->merge(['quantity' => 1]);
        }
        if(!isset($request->specification)){
          $specification = null;
        }
        else{
          $specification = \json_encode($request->specification);
        }

        if (is_null($cartProduct) and $userCartShopID == $currentshopID) {
              if (\Auth::user()->cart()->count() != 0) {
                foreach(\Auth::user()->cart()->get()->first()->products()->get() as $singleCartProduct){
                  if($singleCartProduct->type == 'file' and $product->type != 'file' or $singleCartProduct->type != 'file' and $product->type == 'file'){
                    alert()->error('نمیتوان همزمان فایل و کالای غیر فایلی به سبد خرید اضافه کرد', 'خطا');
                    return redirect()->back();
                  }
                }
              }
            DB::table('cart_product')->insert([
              ['product_id' => $request->product_id,'quantity' => $request->quantity, 'cart_id' => \Auth::user()->cart()->get()->first()->id, 'color_id' => $request->color, 'total_price' => $productPrice, 'specification' => $specification]
              , ]);
            $total_price = 0;
            foreach(\Auth::user()->cart()->get()->first()->cartProduct as $cartProduct){
              $total_price += $cartProduct->total_price;
            }
            $cartUpdate = \Auth::user()->cart()->get()->first()->update([
              'total_price' => $total_price,
              ]);
            toastr()->success('افزوده شد.', '');

            return redirect()->back();
        } else {
            alert()->error('محصول از قبل در سبد خرید شما وجود دارد و یا محصول متعلق به یک فروشگاه نمیباشد', 'خطا');
            return redirect()->back();
        }
    }






    public function removeFromCart(Request $request){
      CartProduct::where([
        ['product_id', '=', $request->id],
        ['cart_id', '=', $request->cart],
        ['color_id', '=', $request->color],
        ])->delete();
        $cartProduct = CartProduct::where('cart_id', \Auth::user()->cart()->get()->first()->id);
        if($cartProduct->count() == 0){
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
