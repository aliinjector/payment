<?php

namespace App\Http\Controllers\Dashboard\Payment;

use App\FastPay;
use App\Http\Requests\FastPayRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FastPayController extends \App\Http\Controllers\Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fastPays = \Auth::user()->fastPays()->get();
        return view('dashboard.payment.fast-pay', compact('fastPays'));
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
    public function store(FastPayRequest $request)
    {

        $FastPay = new FastPay;
        $FastPay->user_id = \Auth::user()->id;
        $FastPay->title = $request->title;
        $FastPay->description = $request->description;
        $FastPay->price = $request->price;
        $FastPay->buy_count = 0;
        $FastPay->save();

        alert()->success('لینک شما باموفقیت اضافه شد.', 'ثبت شد');
        return redirect()->route('fast-pay.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FastPay  $FastPay
     * @return \Illuminate\Http\Response
     */
    public function show(FastPay $FastPay)
    {
        return view('dashboard.payment.fast-pay-show', compact('FastPay'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FastPay  $FastPay
     * @return \Illuminate\Http\Response
     */
    public function edit(FastPay $FastPay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FastPay  $FastPay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FastPay $FastPay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FastPay  $FastPay
     * @return \Illuminate\Http\Response
     */
    public function destroy(FastPay $FastPay)
    {
        //
    }
}
