<?php

namespace App\Http\Controllers\Shop;

use App\Shop;
use App\Product;
use App\Voucher;
use App\UserPurchase;
use App\UserVoucher;
use App\Cart;
use Illuminate\Http\Request;
use Request as RequestFacade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\SpecificationItem;
use Illuminate\Support\Facades\Session;
use Artesaos\SEOTools\Facades\SEOTools;

class PurchaseController extends Controller
{

  public function approved($shopName, Request $request) {
    $shop = Shop::where('english_name', $shopName)->first();
    $shopCategories = $shop->ProductCategories()->get();
    $cart = \Auth::user()->cart()->get()->first();
    $total_price = $cart->total_price;
    $voucher = Voucher::where('code' , $request->code)->get()->first();
    $validVoucher = Voucher::where([['code', $request->code], ['status', 1], ['expires_at', '>', now() ], ['starts_at', '<', now() ],['uses', '>', 0]])->get()->first();
    $userID = \Auth::user()->id;
    $template_folderName = $shop->template->folderName;
    $userVoucherName =  \Auth::user()->firstName .' '.   \Auth::user()->lastName . '-' . \Auth::user()->email;
    // code for this shop check
      if ($validVoucher == null) {
          alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
          return view("app.shop.$template_folderName..purchase-list", compact('shop', 'shopCategories', 'cart'));
      }
      if ($validVoucher != null and $validVoucher->shop_id == Shop::where('english_name', $shopName)->get()->first()->id) {

        //first purchase chekc
        if(Voucher::where('code', $request->code)->get()->first()->first_purchase == 'enable' and \Auth::user()->purchases()->where('shop_id', $shop->id)->get()->count() != 0){
          alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
          return redirect()->back();
        }

        //check if is not for certain users and its for all users
        if($validVoucher != null and $validVoucher->users == null){
          // code is one time use and user use it before check
          if($voucher->disposable == 'enable'){
            $userVoucherUse = UserVoucher::where([['user_id', $userID], ['voucher_id', $voucher->id], ['shop_id', $shop->id]])->first();
            if($userVoucherUse){
              alert()->error('شما قبلا از این کد تخفیف استفاده کردید.', 'خطا');
              return redirect()->back();
            }
          }
          //approved voucher and decrease price
          $voucherDiscountAmount = Voucher::where('code', $request->code)->get()->first()->discount_amount;
          if($voucher->type == 'number'){
          $discountedPrice = $total_price - $voucherDiscountAmount;
        }
        else{
          $discountedPrice =($total_price) - ($total_price * $voucherDiscountAmount / 100);
        }
          if($discountedPrice < 0){
            $discountedPrice = 0;
          }
          if($cart->voucher_status == 'unused'){
            $cartUpdate = $cart->update([
              'total_price' => $discountedPrice,
              'voucher_status' => 'used',
              'voucher_id' => $voucher->id,
              ]);
             alert()->success('کد تخفیف شما باموفقیت اعمال شد.', 'ثبت شد');
             return view("app.shop.$template_folderName..purchase-list", compact('shop', 'shopCategories', 'cart'));
          }
          else{
            alert()->error('شما قبلا از این کد تخفیف استفاده کردید.', 'خطا');
            return view("app.shop.$template_folderName..purchase-list", compact('shop', 'shopCategories', 'cart'));
          }
        }
        else{
          if($voucher->disposable == 'enable'){
            $userVoucherUse = UserVoucher::where([['user_id', $userID], ['voucher_id', $voucher->id], ['shop_id', $shop->id]])->first();
            if($userVoucherUse){
              alert()->error('شما قبلا از این کد تخفیف استفاده کردید.', 'خطا');
              return redirect()->back();
            }
          }
          if(collect($this->getVochersUsers($voucher->id))->contains($userVoucherName)){
            $voucherDiscountAmount = Voucher::where('code', $request->code)->get()->first()->discount_amount;
            if($voucher->type == 'number'){
            $discountedPrice = $total_price - $voucherDiscountAmount;
          }
          else{
            $discountedPrice =($total_price) - ($total_price * $voucherDiscountAmount / 100);
          }
            if($discountedPrice < 0){
              $discountedPrice = 0;
            }
            if($cart->voucher_status == 'unused'){
              $cartUpdate = $cart->update([
                'total_price' => $discountedPrice,
                'voucher_status' => 'used',
                'voucher_id' => $voucher->id,
                ]);
               alert()->success('کد تخفیف شما باموفقیت اعمال شد.', 'ثبت شد');
               return view("app.shop.$template_folderName..purchase-list", compact('shop', 'shopCategories', 'cart'));
            }
            else{
              alert()->error('شما قبلا از این کد تخفیف استفاده کردید.', 'خطا');
              return view("app.shop.$template_folderName..purchase-list", compact('shop', 'shopCategories', 'cart'));
            }
          }
          else{
            alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
            return redirect()->back();
          }
        }
      } else {
          alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
          return redirect()->back();
      }
  }




      public function purchaseList($shop, Request $request) {
        if (\Auth::guest()) {
            return redirect()->route('register');
        }
        $cart = \Auth::user()->cart()->get()->first();
        $shop = Shop::where('english_name', $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        $template_folderName = $shop->template->folderName;

          foreach($request->except('_token') as $productIdAndCartProductId => $quantity){
          $productId = explode('-',$productIdAndCartProductId)[0];
          $cartProductId = explode('-',$productIdAndCartProductId)[1];

            $product = Product::find($productId);
            if($product->off_price != null){
              $productPrice = $product->off_price;
            }
            else{
              $productPrice = $product->price;
            }
            if(RequestFacade::server('HTTP_REFERER') !== route('purchase-list',['shop'=>$shop->english_name, 'userID' => \Auth::user()->id])){
              $SinglecartProduct = DB::table('cart_product')->where([['id', '=', $cartProductId],['cart_id', '=', $cart->id], ['product_id', '=', $productId]])->get()->first();
              $specificationPrice = 0;
              if($SinglecartProduct->specification != null){
                foreach(\json_decode($SinglecartProduct->specification) as $specificationItem){
                  $specificationItem = SpecificationItem::find($specificationItem);
                  $specificationPrice += $specificationItem->price;
                }
              }

              DB::table('cart_product')->where([['id', '=', $cartProductId], ['cart_id', '=', $cart->id], ['product_id', '=', $productId]])->update(['quantity' => $quantity, 'total_price' => $productPrice * $quantity, 'specification_price' => $specificationPrice * $quantity]);
            }
        }

        $total_price = 0;
        foreach($cart->cartProduct as $cartProduct){
          $total_price += $cartProduct->total_price + $cartProduct->specification_price;
        }
        // dd($total_price);

        $cartUpdate = $cart->update([
          'total_price' => $total_price,
          'voucher_status' => 'unused',
          'voucher_id' => null,
          ]);
        return view("app.shop.$template_folderName..purchase-list", compact('shop', 'shopCategories', 'cart'));
      }





      public function purchaseSubmit($shopName, $cartID, Request $request) {
          $cart = \Auth::user()->cart()->get()->first();
          $productIds = collect();
          foreach($cart->cartProduct as $cartProduct){
            $productIds[] = $cartProduct->product_id;
          }
          foreach($productIds as $productId){
            if (Product::find($productId)->amount < 1){
              return redirect()->back()->withErrors('با عرض پوزش محصول  ' . Product::find($productId)->title . ' موجود نمیباشد. لطفا از سبد خرید خود حذف نمایید.');
            }
            }
          $shop = Shop::where('english_name', $shopName)->first();
          $total_price = \Auth::user()->cart()->get()->first()->total_price;
          // address and new addres validation condition
          if($cart->cartProduct[0]->product->type != 'file'){

          if (!isset($request->address)) {

              $request->validate(['new_address' => 'required|max:250', 'shipping_way' => 'required']);
          } else {

              $request->validate(['address' => 'required|max:250', 'shipping_way' => 'required']);
          }
        }
        $shipping = $request->shipping_way;
        $shipping_price = $shipping.'_price';
        $shopShippingWayPrice = Shop::where('english_name', $shopName)->get()->first()->$shipping_price;
          $purchase = new UserPurchase;
          $purchase->cart_id = $cart->id;
          $purchase->user_id = \Auth::user()->id;
          $purchase->shop_id = $shop->id;
          // check if user send new address or select address from his addresses
          if ($request->new_address == null) {
            $purchase->address = $request->address;
              }
              else{
                $purchase->address = $request->new_address;
              }
          $purchase->shipping = $request->shipping_way;
          $purchase->shipping_price = $shopShippingWayPrice;
          $purchase->payment_method = $request->payment_method;

            if($shop->VAT == 'enable') {
              $purchase->total_price = ($total_price) + ($total_price * $shop->VAT_amount / 100);
            }
            else{
              $purchase->total_price = $total_price;
            }


          $purchase->save();
          // the only way that store data in pivot table to find that which user use which voucher in which shop is this if statement
          if($cart->voucher_status == 'used'){
            DB::table('user_vouchers')->insert(['user_id' => \Auth::user()->id, 'voucher_id' => $cart->voucher_id, 'user_purchase_id' => $purchase->id, 'shop_id' => $shop->id]);
            DB::table('vouchers')->where('id', '=', $cart->voucher_id)->decrement('uses');
          }
          DB::table('carts')->where('id', '=', \Auth::user()->cart()->get()->first()->id)->update(['status' => 1]);
          Cart::where('id', \Auth::user()->cart()->get()->first()->id)->get()->first()->delete();
          foreach($productIds as $productId){
            Product::find($productId)->increment('buyCount');
            Product::find($productId)->decrement('amount');
          }
          toastr()->success('خرید شما با موفقیت ثبت شد', 'انجام شد');
          SEOTools::setTitle($shop->name);
          SEOTools::setDescription($shop->description);
          SEOTools::opengraph()->addProperty('type', 'website');
          return redirect()->route('user.purchased.list');
      }




          public function getVochersUsers($id){
          $shop = Shop::where('english_name', RequestFacade::segment(1))->get()->first();
          $users = $shop->vouchers()->where('id' , $id)->get()->first()->users;
          return $users;
          }



          public function getShippingPrice(Request $request){
            $typePrice = $request->type;
            $shippingPrice = Shop::where('english_name', $request->shop)->get()->first()->$typePrice;
            return response()->json($shippingPrice);

          }
}
