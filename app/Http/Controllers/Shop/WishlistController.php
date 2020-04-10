<?php

namespace App\Http\Controllers\Shop;

use App\Wishlist;
use App\Shop;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Http\Requests\WishlistRequest;


class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index($shopName) {
      $shop = Shop::where('english_name', $shopName)->first();
      $shopCategories = $shop->ProductCategories()->get();
      $template_folderName = $shop->template->folderName;
      if(\Auth::user()->wishlist()->get()->where('shop_id', $shop->id)->first() != null){
        $wishlistProducts = \Auth::user()->wishlist()->get()->where('shop_id', $shop->id)->first()->products;
      }
      else
      $wishlistProducts = [];
      $template_folderName = $shop->template->folderName;
          SEOTools::setTitle($shop->name . ' | لیست علاقه مندی ها');
          SEOTools::setDescription($shop->name);
          SEOTools::opengraph()->addProperty('type', 'website');
      return view("app.shop.$template_folderName.wishlist", compact('shop', 'shopCategories', 'wishlistProducts'));

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
    public function store(WishlistRequest $request, $shopName)
    {
      $product = Product::find($request->productID);
      $shop =  Shop::where('english_name', $shopName)->first();
      $wish = Wishlist::firstOrCreate(['user_id'=>\Auth::user()->id, 'shop_id' =>$shop->id]);
      $product->wishlist()->sync($wish->id);


          toastr()->success('افزوده شد.', '');
          return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wishlist $wishlist)
    {
        //
    }


    public function deleteFromWishlist(Request $request){
      $shop = Shop::where('english_name', $request->shop)->get()->first();
      \Auth::user()->wishlist()->get()->where('id', $request->wishlist)->first()->products()->detach($request->id);
      toastr()->success('حذف شد.', '');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(wishlist $wishlist)
    {
        //
    }
}
