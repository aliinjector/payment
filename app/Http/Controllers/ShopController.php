<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Shop;
use App\Product;
use App\Voucher;
use App\ShopCategory;
use App\UserPurchase;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $discountedPrice;
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected function create(array $data)
     {

     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show($shop)
    {
        if(Shop::where('english_name' , $shop)->first() == null){
            return abort(404);
        }
    $shopCategories = Shop::where('english_name' , $shop)->first()->ProductCategories()->get();
    $shop = Shop::where('english_name' , $shop)->first();
    $lastProducts = $shop->products()->orderBy('created_at', 'DESC')->take(4)->get();
    $bestSelling = $shop->products()->orderBy('buyCount', 'DESC')->take(4)->get();
    return view('app.shop', compact('shop','lastProducts','shopCategories','bestSelling'));

    }

    public function showProduct($shop, $id)
    {
        if(Shop::where('english_name' , $shop)->first() == null || Shop::where('english_name' , $shop)->first()->products()->where('id', $id)->first() == null){
            return abort(404);
        }
    $shop = Shop::where('english_name' , $shop)->first();
    $shopCategories = $shop->ProductCategories()->get();
    $product = $shop->products()->where('id', $id)->first();
    return view('app.product-detail', compact('product','shop','shopCategories'));
    }

    public function showCategory($shop, $categroyId)
    {
        // if(Shop::where('english_name' , $shop)->first() == null || Shop::where('english_name' , $shop)->first()->products()->where('id', $id)->first() == null){
        //     return abort(404);
        // }
    $shop = Shop::where('english_name' , $shop)->first();
    $shopCategories = $shop->ProductCategories()->get();
    $products = $shop->ProductCategories()->where('id', $categroyId)->get()->first()->products()->get();
    return view('app.category', compact('products','shopCategories','shop'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    public function purchaseList($shop , $id){
        $product = Product::where('id' , $id)->get()->first();
        $shop = Shop::where('english_name' , $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        return view('app.purchase-list', compact('shop','shopCategories','product'));
    }

    public function tagProduct($shop, $name){
        $shop = Shop::where('english_name' , $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        $products = Tag::where('name' ,$name)->get()->first()->products()->where('shop_id' , $shop->id)->get();
        return view('app.tags-product', compact('products','shop','shopCategories'));

    }

    public function approved($shopName,$productId,Request $request){
        if(Product::where([['id' , $productId] , ['off_price' , null]])->get()->first() == null){
            alert()->error('برای محصولاتی که دارای تخفیف هستند نمیتوان از کد تخفیف استفاده کرد.', 'خطا');
            return redirect()->back();
        }
        elseif(Voucher::where([
            ['code', $request->code],
            ['status', 1],
            ['expires_at','>', now()],
            ['starts_at','<', now()],
        ])->get()->first() == null){
            $shop = Shop::where('english_name' , $shopName)->first();
            $product = Product::where('id' , $productId)->get()->first();
            $shopCategories = $shop->ProductCategories()->get();
            alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
            return view('app.purchase-list', compact('shop','shopCategories','product'));

        }
        if(Product::where([['id' , $productId] , ['off_price' , null]])->get()->first()->shop()->get()->first()->english_name == $shopName and Voucher::where([
            ['code', $request->code],
            ['status', 1],
            ['expires_at','>', now()],
            ['starts_at','<', now()],
        ])->get()->first()->shop_id == Shop::where('english_name' , $shopName)->get()->first()->id){
            $shop = Shop::where('english_name' , $shopName)->first();
            $product = Product::where('id' , $productId)->get()->first();
            $shopCategories = $shop->ProductCategories()->get();
            $productPrice = Product::where('id' , $productId)->get()->first()->price;
            $productOffPrice = Product::where('id' , $productId)->get()->first()->off_price;
            $voucherDiscount = Voucher::where('code', $request->code)->get()->first()->discount_amount;
            $discountedPrice =  $productPrice - $voucherDiscount;
            Session::put('discountedPrice', $discountedPrice);
            Session::put('price', $productPrice);
            Session::put('off_price', $productOffPrice);
            alert()->success('کد تخفیف شما باموفقیت اعمال شد.', 'ثبت شد');
            return view('app.purchase-list', compact('shop','shopCategories','product','discountedPrice','voucherDiscount'));
        }
        else{
            alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
            return redirect()->back();
        }
    }


    public function downlaodFile($shop , $id)
    {
        if(\Auth::guest()){
            return redirect()->route('register');
        }
        else{
            return  redirect(URL::temporarySignedRoute(
            'download.link',
            now()->addMinutes(30),
            ['shop' => $shop , 'id' => $id]
        ));
        }
    }

    public function downlaodLink(Request $request,$shop, $id)
    {
        $this->approved($shop,$id,$request);
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        $uri = Shop::where('english_name' , $shop)->get()->first()->products()->where('id', $id)->get()->first()->attachment;
        $uri = ltrim($uri, '/');
        $shopId = Shop::where('english_name' , $shop)->get()->first()->id;
        $product = Product::where('id' , $id)->get()->first();
        $purchase = new UserPurchase;
        $purchase->product_id = $id;
        $purchase->shop_id = $shopId;
        if($product->off_price == null){
            if (Session::get('discountedPrice') == null) {
                $purchase->total_price = $product->price;
            }
            else{
                $purchase->total_price = Session::get('discountedPrice');
            }
         }
        else{
            $purchase->total_price = $product->off_price;
        }
        Session::pull('discountedPrice');
        if(\Auth::guest()){
            $purchase->user_id = null;
        }
        else{
            $purchase->user_id = \Auth::user()->id;
        }
        $purchase->save();
        return response()->file($uri);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
