<?php

namespace App\Http\Controllers\Shop;

use App\Tag;
use App\Shop;
use App\Product;
use App\Voucher;
use App\ShopCategory;
use App\UserPurchase;
use App\Cart;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShopController extends \App\Http\Controllers\Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $discountedPrice;
    public function index() {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create(array $data) {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show($shop) {
        if (Shop::where('english_name', $shop)->first() == null) {
            return abort(404);
        }
        $shopCategories = Shop::where('english_name', $shop)->first()->ProductCategories()->get();
        $shop = Shop::where('english_name', $shop)->first();
        $lastProducts = $shop->products()->orderBy('created_at', 'DESC')->take(4)->get();
        $bestSelling = $shop->products()->orderBy('buyCount', 'DESC')->take(4)->get();
        return view('app.shop.shop', compact('shop', 'lastProducts', 'shopCategories', 'bestSelling'));
    }
    public function showProduct($shop, $id) {
        if (Shop::where('english_name', $shop)->first() == null || Shop::where('english_name', $shop)->first()->products()->where('id', $id)->first() == null) {
            return abort(404);
        }
        $shop = Shop::where('english_name', $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        $product = $shop->products()->where('id', $id)->first();
        return view('app.shop.product-detail', compact('product', 'shop', 'shopCategories'));
    }
    public function showCategory($shop, $categroyId,Request $request) {
        $shop = Shop::where('english_name', $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        $category = ProductCategory::where('id' , $categroyId)->get()->first()->id;
        if($request->has('type') and $request->has('sortBy') and $request->has('minprice') and $request->has('maxprice')){
          $orderBy = $request->sortBy['orderBy'];
          $minPrice = $request->minprice;
          $maxPrice = $request->maxprice;
          $filterBy = $request->type;
          $sortBy = $request->sortBy['field'];
          $perPage = 8;
          if($request->type == 'all'){
            $products = $shop->ProductCategories()->where('id', $categroyId)->get()->first()->products()->whereBetween('price', [$minPrice, $maxPrice])->orderBy($sortBy , $orderBy)->paginate($perPage);
          }
          else{
            $products = $shop->ProductCategories()->where('id', $categroyId)->get()->first()->products()->where('type' , $request->type)->whereBetween('price', [$minPrice, $maxPrice])->orderBy($sortBy , $orderBy)->paginate($perPage);
          }
        }
        else{
        $products = $shop->ProductCategories()->where('id', $categroyId)->get()->first()->products()->paginate(8);
      }
        return view('app.shop.category', compact('products', 'shopCategories', 'shop','category'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop) {
        //

    }
    public function purchaseList($shop, $id) {
        if (\Auth::guest()) {
            return redirect()->route('register');
        } else {
            $product = Product::where('id', $id)->get()->first();
            $shop = Shop::where('english_name', $shop)->first();
            $shopCategories = $shop->ProductCategories()->get();
            return view('app.shop.purchase-list', compact('shop', 'shopCategories', 'product'));
        }
    }
    public function tagProduct($shop, $name,Request $request) {
        $shop = Shop::where('english_name', $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        $tagName = Tag::where('name', $name)->get()->first()->name;
        if($request->has('type') and $request->has('sortBy')){
          $orderBy = $request->sortBy['orderBy'];
          $filterBy = $request->type;
          $sortBy = $request->sortBy['field'];
          $perPage = 16;
          if($request->type == 'all'){
            $products = Tag::where('name', $name)->get()->first()->products()->where('shop_id', $shop->id)->orderBy($sortBy , $orderBy)->paginate($perPage);
          }
          else{
            $products = Tag::where('name', $name)->get()->first()->products()->where('shop_id', $shop->id)->where('type' , $request->type)->orderBy($sortBy , $orderBy)->paginate($perPage);
          }
        }
        else{
        $products = Tag::where('name', $name)->get()->first()->products()->where('shop_id', $shop->id)->paginate(8);
      }
        return view('app.shop.tags-product', compact('products', 'shop', 'shopCategories','tagName'));
    }
    public function approved($shopName, $productId, Request $request) {
        if (Voucher::where([['code', $request->code], ['status', 1], ['expires_at', '>', now() ], ['starts_at', '<', now() ], ])->get()->first() == null) {
            $shop = Shop::where('english_name', $shopName)->first();
            $product = Product::where('id', $productId)->get()->first();
            $shopCategories = $shop->ProductCategories()->get();
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
            alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
            return view('app.shop.purchase-list', compact('shop', 'shopCategories', 'product','products','quantity','productTotal_price','total_price'));
        }
        if (Voucher::where([['code', $request->code], ['status', 1], ['expires_at', '>', now() ], ['starts_at', '<', now() ], ])->get()->first()->shop_id == Shop::where('english_name', $shopName)->get()->first()->id) {
            $shop = Shop::where('english_name', $shopName)->first();
            $product = Product::where('id', $productId)->get()->first();
            $shopCategories = $shop->ProductCategories()->get();
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
            $cartTotalPrice = \Auth::user()->cart()->get()->first()->total_price;
            $voucherDiscount = Voucher::where('code', $request->code)->get()->first()->discount_amount;
            $discountedPrice = $cartTotalPrice - $voucherDiscount;
            Session::put('discountedPrice', $discountedPrice);
            alert()->success('کد تخفیف شما باموفقیت اعمال شد.', 'ثبت شد');
            return view('app.shop.purchase-list', compact('shop', 'shopCategories', 'product', 'discountedPrice', 'voucherDiscount','products' , 'quantity','productTotal_price','total_price'));
        }
        else {
            alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
            return redirect()->back();
        }
    }


    public function downlaodFile($shop, $id) {
        $product = Product::find($id);
        $purchase = $product->purchases()->get();
        if (\auth::user()) {
            $userPurchase = $purchase->where('user_id', \auth::user()->id);
        } else {
            $userPurchase = null;
        }
        if ($userPurchase->count() > 0) {
            return redirect(URL::temporarySignedRoute('download.link', now()->addMinutes(30), ['shop' => $shop, 'id' => $id]));
        } else {
            return redirect()->route('login');
        }
    }
    public function downlaodLink(Request $request, $shop, $id) {
        $this->approved($shop, $id, $request);
        if (!$request->hasValidSignature()) {
            abort(401);
        }
        $uri = Shop::where('english_name', $shop)->get()->first()->products()->where('id', $id)->get()->first()->attachment;
        $uri = ltrim($uri, '/');
        $shopId = Shop::where('english_name', $shop)->get()->first()->id;
        $product = Product::where('id', $id)->get()->first();
        $purchase = new UserPurchase;
        $purchase->product_id = $id;
        $purchase->shop_id = $shopId;
        if ($product->off_price == null) {
            if (Session::get('discountedPrice') == null) {
                $purchase->total_price = $product->price;
            } else {
                $purchase->total_price = Session::get('discountedPrice');
            }
        } else {
            $purchase->total_price = $product->off_price;
        }
        Session::pull('discountedPrice');
        if (\Auth::guest()) {
            $purchase->user_id = null;
        } else {
            $purchase->user_id = \Auth::user()->id;
        }
        $purchase->save();
        return response()->file($uri);
    }


    public function purchaseSubmit($shop, $cartID, Request $request) {
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


        $cart = Cart::where('id', $cartID)->get()->first();
        $shopId = Shop::where('english_name', $shop)->get()->first()->id;
            if (!isset($request->address)) {
                $request->validate(['new_address' => 'required']);
            } else {
                $request->validate(['address' => 'required']);
            }
        if (isset(\Auth::user()->userInformation()->get()->first()->address)) {
            $userAddress1 = \Auth::user()->userInformation()->get()->first()->address;
        }
        if (isset(\Auth::user()->userInformation()->get()->first()->address_2)) {
            $userAddress2 = \Auth::user()->userInformation()->get()->first()->address_2;
        }
        if (isset(\Auth::user()->userInformation()->get()->first()->address_3)) {
            $userAddress3 = \Auth::user()->userInformation()->get()->first()->address_3;
        }
        $purchase = new UserPurchase;
        $purchase->cart_id = $cartID;
        $purchase->user_id = \Auth::user()->id;
        $purchase->shop_id = $shopId;
        if ($request->new_address == null) {
            if ($request->address == "address_1") {
                $purchase->address = $userAddress1;
            } elseif ($request->address == "address_2") {
                $purchase->address = $userAddress2;
            } elseif ($request->address == "address_3") {
                $purchase->address = $userAddress3;
            }
        } else {
            $purchase->address = $request->new_address;
        }
        $purchase->shipping = $request->shipping_way;
            if (Session::get('discountedPrice') == null) {
                $purchase->total_price = \Auth::user()->cart()->get()->first()->total_price;
            } else {
                $purchase->total_price = Session::get('discountedPrice');
            }
        $purchase->save();
        Session::pull('discountedPrice');
        DB::table('carts')->where('id', '=', \Auth::user()->cart()->get()->first()->id)->update(['status' => 1]);
        Cart::where('id', \Auth::user()->cart()->get()->first()->id)->get()->first()->delete();
        alert()->success('خرید شما با موفقیت ثبت شد', 'تبریک');
        return redirect()->route('user.purchased.list', ['userID' => \auth::user()->id]);
    }
    public function userPurchaseList() {
        $purchases = \auth::user()->purchases()->orderBy('id', 'ASC')->get();
        return view('app.shop.user-purchased-list', compact('purchases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop) {
        //

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop) {
        //

    }
}
