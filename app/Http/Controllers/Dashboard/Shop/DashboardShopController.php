<?php

namespace App\Http\Controllers\Dashboard\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserPurchase;

class DashboardShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = UserPurchase::where('shop_id' , \Auth::user()->shop()->first()->id)->get();
        $shop = \Auth::user()->shop()->first();
        $bestSelling = $shop->products()->orderBy('buyCount', 'DESC')->take(3)->get();
        $sumPrices = $shop->purchases()->get();
        $sum = 0;
        foreach($sumPrices as $sumPrice){
            $sum += $sumPrice->product()->first()->price;
            }
        return view('dashboard.shop.dashboard-shop', compact('purchases','shop','bestSelling' , 'sum'));
    }

    public function purchaseStatus()
    {
        $purchases = UserPurchase::where('user_id' , \Auth::user()->id)->get();
        return view('dashboard.shop.purchase-status', compact('purchases'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
