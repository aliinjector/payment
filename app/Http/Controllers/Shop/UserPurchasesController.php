<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductDownloadStatus;
use App\UserPurchase;
use App\Shop;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Product;
use App\Notifications\NewDownloadLinkRequest;
use App\Http\Requests\UserPurchasesRequest;




class UserPurchasesController extends Controller
{

      public function userPurchaseList() {
          $purchases = \auth::user()->purchases()->orderBy('created_at', 'asc')->get();
          if(\auth::user()->shop_id != null){
            $shop_name = Shop::where('id', \auth::user()->shop_id)->get()->first()->english_name;
            $shop = Shop::find(\auth()->user()->shop_id);
            SEOTools::setTitle('لیست سفارشات');
            SEOTools::setDescription('لیست سفارشات');
            SEOTools::opengraph()->addProperty('type', 'website');
            return view("app.shop.account.user-purchases", compact('purchases', 'shop_name','shop'));
          }
          else{
            SEOTools::setTitle('لیست سفارشات');
            SEOTools::setDescription('لیست سفارشات');
            SEOTools::opengraph()->addProperty('type', 'website');
            return view("app.shop.account.user-purchases", compact('purchases'));
          }
      }




      public function showPurchase($id){
        $shop = Shop::find(\auth()->user()->shop_id);
        $purchase = \auth::user()->purchases()->where('id', $id)->get()->first();
        $specificationItems = collect();
        if($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->shop->specifications != null){
        foreach($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->shop->specifications()->withTrashed()->get() as $specification){
          foreach ($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->cartProduct as $cartProduct) {
            if($cartProduct->specification != null){
          foreach ($cartProduct->specification as $itemId) {
            foreach ($specification->items()->withTrashed()->get()->where('id', $itemId) as $item) {
              $specificationItems[] = $item;
            }
                }
              }
              }
        }
      }
      SEOTools::setTitle('سفارش شما');
      SEOTools::setDescription('سفارش شما');
      SEOTools::opengraph()->addProperty('type', 'website');
        return view("app.shop.account.purchase-show", compact('purchase','specificationItems','shop'));
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
      SEOTools::setTitle('فاکتور');
      SEOTools::setDescription('فاکتور');
      SEOTools::opengraph()->addProperty('type', 'website');
        return view("app.shop.account.invoice", compact('purchase','products','shop','purchase','shopCategories','specificationItems'));

          }



      public function downloadLinkRequest(UserPurchasesRequest $request){
        $shop =  UserPurchase::find($request->user_purchase_id)->shop;
        $shopOwner =  $shop->user;
        $product =  Product::find($request->product_id);
        $downloadLinkRequest = ProductDownloadStatus::updateOrCreate(
          ['product_id' => $request->product_id, 'user_purchase_id' => $request->user_purchase_id, 'shop_id' => $shop->id]);
          $details = [
                'message' => 'یک درخواست لینک دانلود جدید برای فایل' .' '. $product->title,
                'url' => 'download-link-request-status.index'
            ];
          $shopOwner->notify(new NewDownloadLinkRequest($details));
          toastr()->success('درخواست شما با موفقیت ارسال شد و پس از بررسی توسط مدیر فروشگاه لینک جدید در همین صفحه قابل دسترسی میباشد');
          return redirect()->back();
}





}
