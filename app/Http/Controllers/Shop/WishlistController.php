<?php

namespace App\Http\Controllers\Shop;

use App\wishlist;
use App\shop;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index($shop) {
      $shop = Shop::where('english_name', $shop)->first();
      $shopCategories = $shop->ProductCategories()->get();
      if(\Auth::user()->wishlist != null)
        $wishlistProducts = \Auth::user()->wishlist->products;

      else
      $wishlistProducts = [];
      $template_folderName = $shop->template->folderName;

      return view("app.shop.$template_folderName.account.wishlist", compact('shop', 'shopCategories', 'wishlistProducts'));
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
    public function store(Request $request, $shopName)
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
      Wishlist::find($request->wishlist)->products()->detach($request->id);
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
