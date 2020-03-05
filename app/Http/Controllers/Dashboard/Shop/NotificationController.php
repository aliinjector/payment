<?php

namespace App\Http\Controllers\Dashboard\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function readAll(){

      $shopOwner = \Auth::user();
      $shopOwner->notifications()->update(['read_at' => now()]);
      alert()->success('عملیات با موفقیت ثبت شد', 'انجام شد');
      return redirect()->back();
    }
}
