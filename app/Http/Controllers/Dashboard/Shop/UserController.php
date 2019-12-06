<?php

namespace App\Http\Controllers\Dashboard\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
      $shop = \Auth::user()->shop()->first();
      $users = $shop->users()->get();

      return view('dashboard.shop.users', compact('shop', 'users'));

    }

    public function show(){

    }


    public function update(){

    }

    public function destroy(){

    }


}
