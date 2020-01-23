<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductDownloadStatus;
use App\UserPurchase;
use App\Shop;


class UserPurchasesController extends Controller
{

      public function userPurchaseList() {
          $purchases = \auth::user()->purchases()->orderBy('id', 'ASC')->get();
          return view("app.shop.user-purchased-list", compact('purchases'));
      }



      public function downloadLinkRequest($product_id, $user_purchase_id, Request $request){
        $shopId =  UserPurchase::find($user_purchase_id)->shop->id;
        $downloadLinkRequest = ProductDownloadStatus::updateOrCreate(
          ['product_id' => $product_id, 'user_purchase_id' => $user_purchase_id, 'shop_id' => $shopId]);

          toastr()->success('درخواست شما با موفقیت ارسال شد و پس از بررسی توسط مدیر فروشگاه لینک جدید در همین صفحه قابل دسترسی میباشد', 'انجام شد');
          return redirect()->back();
}





}
