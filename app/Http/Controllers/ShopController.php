<?php

namespace App\Http\Controllers;

use App\Shop;
use App\ShopCategory;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Tag;
use App\UserPurchase;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function downlaodFile($shop , $id)
    {
        return  redirect(URL::temporarySignedRoute(
            'download.link', now()->addMinutes(1), ['shop' => $shop , 'id' => $id]));
    }

    public function downlaodLink(Request $request,$shop, $id)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        $uri = Shop::where('english_name' , $shop)->get()->first()->products()->where('id', $id)->get()->first()->attachment;
        $uri = ltrim($uri, '/');
        $shopId = Shop::where('english_name' , $shop)->get()->first()->id;
        $purchase = new UserPurchase;
        $purchase->product_id = $id;
        $purchase->shop_id = $shopId;
        if(\Auth::guest()){
            $purchase->user_id = null;
        }
        else{
            $purchase->user_id = \Auth::user()->id;
        }
        $purchase->save();
        return response()->file($uri);

    }

    public function purchaseSuccess($shop){

        $shop = Shop::where('english_name' , $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        return view('app.purchaseSuccess', compact('shop','shopCategories'));
    }

    public function tagProduct($shop, $name){
        $shop = Shop::where('english_name' , $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        $products = Tag::where('name' ,$name)->get()->first()->products()->where('shop_id' , $shop->id)->get();
        return view('app.tags-product', compact('products','shop','shopCategories'));

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
