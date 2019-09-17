<?php

namespace App\Http\Controllers\Dashboard\Payment;

use App\Checkout;
use App\Card;
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
        $checkouts = Checkout::with('user', 'card', 'wallet')->get();
        return view('dashboard.payment.checkout', compact('checkouts'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        $wallet = \Auth::user()->wallets()->get()->find($request->wallet_id);
        $card = \Auth::user()->cards()->get()->find($request->card_id);

        if ($wallet->amount < $request->amount){
            alert()->error('موجودی کافی نیست.', 'خطا');
            return redirect()->route('wallet.index');
            exit;
        }


        $trackingCode = substr(\Auth::user()->id, 22, 2). substr(uniqid(), 10, 13) . substr(time(),5 ,7);

        $checkOutUser = \Auth::user()->checkouts()->create([
            'user_id' => \Auth::user()->id,
            'card_id' => $request->card_id,
            'wallet_id' => $request->wallet_id,
            'amount' => $request->amount,
            'status' => 'بررسی نشده',
            'trackingCode' => $trackingCode,
        ]);



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
