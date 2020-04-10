<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Stat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ErrorLog;
use Artesaos\SEOTools\Facades\SEOTools;
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
        if (\Auth::user()->type == 'customer') {
            return redirect()->back();
        } else {
            $shop = \Auth::user()->shop()->first();
            $bestSellings = $shop->products()->orderBy('buyCount', 'DESC')->take(3)->get();
            $shopPurchases = $shop->purchases()->get();
            $sumPurchasesPrice = 0;
            foreach ($shopPurchases as $shopPurchase) {
                $sumPurchasesPrice += $shopPurchase->total_price;
            }
            SEOTools::setTitle($shop->name . ' | داشبورد');
            SEOTools::setDescription($shop->name);
            SEOTools::opengraph()->addProperty('type', 'website');

            // Charts
            $weeklyVisits = \DB::table('stats')->where('shop_id', $shop->id)->select('day', \DB::raw('count(*) as total'))->groupBy('day')->limit(7)->get();
            $weeklyVisitors = \DB::table('stats')->where('shop_id', $shop->id)->select('day', \DB::raw('count(DISTINCT `ip`) as total'))->groupBy('day')->limit(7)->get();

            \Carbon\Carbon::setWeekStartsAt(\Carbon\Carbon::SATURDAY);
            \Carbon\Carbon::setWeekEndsAt(\Carbon\Carbon::FRIDAY);
            $purchases = UserPurchase::where('shop_id', $shop->id)->whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->get();

            $purchasesSabtShode = UserPurchase::where('shop_id', $shop->id)->where('status', 0)->count();
            $purchasesPardakhtShode = UserPurchase::where('shop_id', $shop->id)->where('status', 1)->count();
//            $addedToCart = \DB::table('cart_product')->where('shop_id', $shop->id)->get();
            $visitorsCount = Stat::where('shop_id', $shop->id)->distinct('ip')->count('ip');

            return view('dashboard.shop.dashboard-shop', compact('shop', 'bestSellings', 'sumPurchasesPrice', 'weeklyVisits', 'weeklyVisitors', 'purchases', 'purchasesSabtShode', 'purchasesPardakhtShode', 'visitorsCount'));
        }
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
