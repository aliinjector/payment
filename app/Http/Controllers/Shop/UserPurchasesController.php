<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;


class UserPurchasesController extends Controller
{

      public function userPurchaseList() {
          $purchases = \auth::user()->purchases()->orderBy('id', 'ASC')->get();

          return view("app.shop.user-purchased-list", compact('purchases'));
      }

}
