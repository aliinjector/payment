<?php

namespace App\Http\Controllers\Dashboard;

use Alert;
use App\Wallet;
use App\Http\Requests\WalletRequest;
use Illuminate\Http\Request;

class WalletController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = \Auth::user()->wallets()->get();
        $cards = \Auth::user()->cards()->get();
        return view('dashboard.wallet', compact('wallets', 'cards'));
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
    public function store(WalletRequest $request)
    {
        $key = str_replace( '=' , '', base64_encode(\Auth::user()->id . mt_rand('1', '99') . \Auth::user()->id . time()  . \Auth::user()->id));
        $wallet = new Wallet;
        $wallet->name = $request->name;
        $wallet->amount = 0;
        $wallet->user_id = \Auth::user()->id;
        $wallet->key = $key;
        $wallet->save();

        alert()->success('کیف پول موفقیت اضافه شد.', 'انجام شد');
        return redirect()->route('wallet.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
