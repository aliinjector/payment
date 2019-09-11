<?php

namespace App\Http\Controllers\Dashboard;

use App\Checkout;
use App\Http\Requests\CheckoutRequest;
use App\Wallet;
use Illuminate\Http\Request;

class CheckoutController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkouts = \Auth::user()->checkouts()->get();
        return view('dashboard.checkout', compact('checkouts'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        $wallet = Wallet::find($request->wallet_id);


        if ($wallet->amount < $request->amount){
            alert()->error('موجودی کافی نیست.', 'خطا');
            return redirect()->route('wallet.index');
            exit;
        }

        if ($wallet->user_id !== \Auth::user()->id){
            alert()->error('خطا', 'خطا');
            return redirect()->route('wallet.index');
            exit;
        }



        $checkout = new Checkout;
        $checkout->user_id = \Auth::user()->id;
        $checkout->card_id = $request->id;
        $checkout->wallet_id = $request->wallet_id;
        $checkout->amount = $request->amount;
        $checkout->status = 'بررسی نشده';
        $checkout->save();

        alert()->success('درخواست شما باموفقیت اضافه شد.', 'ثبت شد');
        return redirect()->route('checkout.index');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
