<?php

namespace App\Http\Controllers\Dashboard\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ErrorLog;
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
        if(\Auth::user()->type == 'customer'){
            return redirect()->back();
        }else{
        $shop = \Auth::user()->shop()->first();
        $bestSellings = $shop->products()->orderBy('buyCount', 'DESC')->take(3)->get();
        $shopPurchases = $shop->purchases()->get();
        $sumPurchasesPrice = 0;
        foreach($shopPurchases as $shopPurchase){
            $sumPurchasesPrice += $shopPurchase->total_price;
            }
        return view('dashboard.shop.dashboard-shop', compact('shop','bestSellings' , 'sumPurchasesPrice'));
            }
      }

    public function purchaseStatus()
    {
        $shop = \Auth::user()->shop()->first();
        $purchases = $shop->purchases->sortByDesc('created_at');
        return view('dashboard.shop.purchase-status', compact('purchases','shop'));
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
