<?php

namespace App\Http\Controllers\Dashboard\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
      $shop = \Auth::user()->shop()->first();
      $users = \Auth::user()->shop()->first();
      return view('dashboard.shop.stats', compact('shop'));

    }

    public function show(){

    }


    public function update(){

    }

    public function destroy(){

    }


}
