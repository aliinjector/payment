<?php

namespace App\Http\Controllers\Dashboard\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UserController extends Controller
{
    public function index(){
      $shop = \Auth::user()->shop()->first();
      $users = $shop->users()->get();

      return view('dashboard.shop.users.index', compact('shop', 'users'));

    }

    public function edit(User $user){
      $shop = \Auth::user()->shop()->first();

      return view('dashboard.shop.users.edit', compact('shop', 'user'));

    }


    public function update(){

    }

    public function purcheses(User $user){
      $shop = \Auth::user()->shop()->first();
      $purcheses = $user->purchases()->get();
      return view('dashboard.shop.users.purcheses', compact('shop', 'user', 'purcheses'));

    }


}
