<?php

namespace App\Http\Controllers\Shop;

use App\wishlist;
use App\shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $shop)
    {
      $shop =  Shop::where('english_name', $shop)->first();
      // if(\Auth::user()->wishlist == null){
      //   $wishlist = new Wishlist;
      //   $wishlist->user_id = \Auth::user()->id;
      //   $wishlist->shop_id = $shop->id;
      //   $wishlist->save();
      //   return redirect()->back();
      // }
      if(\Auth::user()->wishlist == null)
      {
              $wish = Wishlist::firstOrCreate(['user_id'=>\Auth::user()->id, 'shop_id' =>$shop]);

          \Auth::user()->wishlist()->sync($wish->id);
      }
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
