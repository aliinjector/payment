<?php

namespace App\Http\Controllers\Dashboard\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ErrorLog;
use Artesaos\SEOTools\Facades\SEOTools;

use App\User;
class UserController extends Controller
{
    public function index(){
      if(request()->has('notification')){
        $user = \auth()->user();
        $user->notifications()->where('type', 'App\Notifications\NewUserRegisterInShop')->update(['read_at' => now()]);
      }
      $shop = \Auth::user()->shop()->first();
      $users = $shop->users()->get();
        SEOTools::setTitle($shop->name . ' | کاربران');
          SEOTools::setDescription($shop->name);
          SEOTools::opengraph()->addProperty('type', 'website');
      return view('dashboard.shop.users.index', compact('shop', 'users'));

    }


    public function purchases(User $user){
      $shop = \Auth::user()->shop()->first();
      $purchases = $user->purchases()->where('shop_id', $shop->id)->get();
      return view('dashboard.shop.users.purchases', compact('shop', 'user', 'purchases'));
    }



    public function purcheseShow($userID, $id){

    $user = User::find($userID);
    $shop = \Auth::user()->shop()->first();
    $purchase = $user->purchases()->where('id', $id)->get()->first();
    return view('dashboard.shop.users.purchase-show', compact('purchase', 'shop'));

    }


}
