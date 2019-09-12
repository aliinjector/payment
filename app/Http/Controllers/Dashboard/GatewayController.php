<?php

namespace App\Http\Controllers\Dashboard;

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
        return view('dashboard.gateway', compact('gateways', 'wallets'));
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
        $key = str_replace( '=' , '', base64_encode(\Auth::user()->id . mt_rand('1', '99') . \Auth::user()->id . time()  . \Auth::user()->id));
        $gateway = new Gateway;
        $gateway->name = $request->name;
        $gateway->url = $request->url;
        $gateway->category = $request->category;
        $gateway->description = $request->description;
        $gateway->url = $request->url;
        $gateway->user_id = \Auth::user()->id;
        $gateway->wallet_id = $request->wallet_id;
        $gateway->key = $key;
        $gateway->save();

        alert()->success('کیف پول موفقیت اضافه شد.', 'انجام شد');
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
    public function update(GatewayRequest $request, Gateway $gateway)
    {
        if ($gateway->user_id !== \Auth::user()->id){
            alert()->error('خطا', 'خطا');
            return redirect()->route('gateway.index');
            exit;
        }

        $gateway->name = $request->name;
        $gateway->url = $request->url;
        $gateway->category = $request->category;
        $gateway->description = $request->description;
        $gateway->wallet_id = $request->wallet_id;
        $gateway->save();

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
