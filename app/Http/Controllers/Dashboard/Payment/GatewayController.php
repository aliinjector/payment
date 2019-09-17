<?php

namespace App\Http\Controllers\Dashboard\Payment;

use Alert;
use App\Card;
use App\Gateway;
use App\Http\Requests\CardRequest;
use App\Http\Requests\GatewayRequest;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class GatewayController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gateways = \Auth::user()->gateways()->get();
        $wallets = \Auth::user()->wallets()->get();
        return view('dashboard.payment.gateway', compact('gateways', 'wallets'));
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
    public function store(GatewayRequest $request)
    {
        $key = str_replace( '=' , '', base64_encode(mt_rand(0, 99) . time()  . substr(\Auth::user()->id, 0, 5)));
        $gateway = \Auth::user()->gateways()->create([
        'name' => $request->name,
        'url' => $request->url,
        'category' => $request->category,
        'description' => $request->description,
        'url' => $request->url,
        'wallet_id' => $request->wallet_id,
        'key' => $key,
        ]);

        alert()->success('درگاه با موفقیت اضافه شد.', 'انجام شد');
        return redirect()->route('gateway.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gateway  $gateway
     * @return \Illuminate\Http\Response
     */
    public function show(Gateway $gateway)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gateway  $gateway
     * @return \Illuminate\Http\Response
     */
    public function edit(Gateway $gateway)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gateway  $gateway
     * @return \Illuminate\Http\Response
     */
    public function update(GatewayRequest $request)
    {

        $gateway = \Auth::user()->gateways()->where('id', $request->id)->first()->update([
            'name' => $request->name,
            'url' => $request->url,
            'category' => $request->category,
            'description' => $request->description,
            'wallet_id' => $request->wallet_id,
        ]);




        alert()->success('درگاه موفقیت ویرایش شد.', 'انجام شد');
        return redirect()->route('gateway.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gateway  $gateway
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gateway $gateway)
    {
        //
    }
}
