<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Stat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = \Auth::user()->shop()->first();
        return view('dashboard.shop.stats', compact('shop'));
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

}
