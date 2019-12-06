<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Artesaos\SEOTools\Facades\SEOTools;


class CompareController extends Controller
{

      public function index($shop)
      {

          if (Shop::where('english_name', $shop)->first() == null) {
              return abort(404);
          }
          $shopCategories = Shop::where('english_name', $shop)->first()->ProductCategories()->get();
          $shop = Shop::where('english_name', $shop)->first();
          toastr()->info('محصولات اضافه شدند.');

          SEOTools::setTitle($shop->name . ' | ' . 'مقایسه محصولات');
          SEOTools::setDescription($shop->description);
          SEOTools::opengraph()->addProperty('type', 'website');

          return view('app.shop.compare', compact('shop', 'shopCategories'));

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
      $product = Product::find($request->productID);
      $shop =  Shop::where('english_name', $shopName)->first();
      $compare = Wishlist::firstOrCreate(['user_id'=>\Auth::user()->id, 'shop_id' =>$shop->id]);
      $product->compare()->sync($compare->id);


          toastr()->success('افزوده شد.', '');
          return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\compare  $compare
     * @return \Illuminate\Http\Response
     */
    public function show(compare $compare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\compare  $compare
     * @return \Illuminate\Http\Response
     */
    public function edit(compare $compare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\compare  $compare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, compare $compare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\compare  $compare
     * @return \Illuminate\Http\Response
     */
    public function destroy(compare $compare)
    {
        //
    }
}
