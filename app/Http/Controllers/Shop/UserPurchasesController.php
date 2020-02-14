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
          $purchases = \auth::user()->purchases()->orderBy('created_at', 'desc')->get();
          return view("app.shop.account.user-purchases", compact('purchases'));
      }




      public function showPurchase($id){
        $purchase = \auth::user()->purchases()->where('id', $id)->get()->first();
        $specificationItems = collect();
        if($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->shop->specifications != null){
        foreach($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->shop->specifications as $specification){
          foreach ($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->cartProduct as $cartProduct) {
            if($cartProduct->specification != null){
          foreach ($cartProduct->specification as $itemId) {
            foreach ($specification->items->where('id', $itemId) as $item) {
              $specificationItems[] = $item;
            }
                }
              }
              }
        }
      }
        return view("app.shop.account.purchase-show", compact('purchase','specificationItems'));
      }





      public function showInvoice($purchaseId) {
        $purchase = \auth::user()->purchases()->where('id', $purchaseId)->get()->first();
        $cart = $purchase->cart()->withTrashed()->get()->first();
        $shop = $purchase->shop;
        $shopCategories = $shop->ProductCategories()->get();
        $products = $cart->products;
        $specificationItems = collect();
        if($cart->shop->specifications != null){
        foreach($cart->shop->specifications as $specification){
          foreach ($cart->cartProduct as $cartProduct) {
            if($cartProduct->specification != null){
          foreach ($cartProduct->specification as $itemId) {
            foreach ($specification->items->where('id', $itemId) as $item) {
              $specificationItems[] = $item;
            }
                }
              }
              }
        }
      }
        return view("app.shop.account.invoice", compact('purchase','products','shop','purchase','shopCategories','specificationItems'));

          }



      public function downloadLinkRequest($product_id, $user_purchase_id, Request $request){
        $shopId =  UserPurchase::find($user_purchase_id)->shop->id;
        $downloadLinkRequest = ProductDownloadStatus::updateOrCreate(
          ['product_id' => $product_id, 'user_purchase_id' => $user_purchase_id, 'shop_id' => $shopId]);

          toastr()->success('درخواست شما با موفقیت ارسال شد و پس از بررسی توسط مدیر فروشگاه لینک جدید در همین صفحه قابل دسترسی میباشد', 'انجام شد');
          return redirect()->back();
}





}
