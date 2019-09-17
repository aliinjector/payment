<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductCategory;
use App\Shop;
use App\ShopCategory;

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
    $shop = Shop::where('english_name' , $shop)->first();
    $lastProducts = $shop->products()->take(8)->get();
    return view('app.shop', compact('shop','lastProducts'));

    }

    public function showProduct($shop, $id)
    {
        if(Shop::where('english_name' , $shop)->first() == null || Shop::where('english_name' , $shop)->first()->products()->where('id', $id)->first() == null){
            return abort(404);
        }
    $product = Shop::where('english_name' , $shop)->first()->products()->where('id', $id)->first();
    return view('app.product-detail', compact('product'));
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
