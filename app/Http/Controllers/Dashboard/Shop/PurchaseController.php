<?php

namespace App\Http\Controllers\Dashboard\Shop;

use Illuminate\Http\Request;
use App\CartProduct;
use App\UserPurchase;
use Illuminate\Support\Facades\DB;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Http\Controllers\Controller;


class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(request()->has('notification')){
        $user = \auth()->user();
        $user->notifications()->where('type', 'App\Notifications\NewPurchaseForShopOwner')->update(['read_at' => now()]);
      }
        $shop = \Auth::user()->shop()->first();
        $purchases = $shop->purchases;
        $shopSpecifications = $shop->specifications;
        SEOTools::setTitle($shop->name . ' | سفارشات');
        SEOTools::setDescription($shop->name);
        SEOTools::opengraph()->addProperty('type', 'website');
        return view('dashboard.shop.purchase.purchase-index', compact('purchases', 'shop', 'shopSpecifications'));
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
      $shop = \Auth::user()->shop()->first();
      $purchase = $shop->purchases()->where('id', $id)->get()->first();
      SEOTools::setTitle($shop->name . ' | سفارش شماره ' . $purchase->id);
      SEOTools::setDescription($shop->name);
      SEOTools::opengraph()->addProperty('type', 'website');
      return view('dashboard.shop.purchase.purchase-show', compact('purchase', 'shop'));
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
     public function destroy(Request $request)
     {
       $request->validate([
         'id' => 'required|numeric|min:1|max:10000000000',
         'purchaseid' => 'required|numeric|min:1|max:10000000000'
   ]);
       $cartProduct = CartProduct::find($request->id);
       $purchase = UserPurchase::find($request->purchaseid);
       if ($purchase->shop->user_id !== \Auth::user()->id) {
               alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
               return redirect()->back();
             }
       if ($cartProduct->cart()->withTrashed()->get()->first()->shop->user_id !== \Auth::user()->id) {
               alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
               return redirect()->back();
             }

             DB::transaction(function () use ($purchase, $cartProduct) {
                    $cartProduct->delete();
                    $newTotalPrice = $purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->cartProduct->sum('total_price');
                    $purchase->update([
                      'total_price' => $newTotalPrice
                    ]);
                    alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
                    return redirect()->back();
           });


    }

}
