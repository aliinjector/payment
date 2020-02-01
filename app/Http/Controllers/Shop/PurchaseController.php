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
use Illuminate\Support\Facades\Session;
use Artesaos\SEOTools\Facades\SEOTools;

class PurchaseController extends Controller
{

  public function approved($shopName, Request $request) {
    // dd($request->all());
    $shop = Shop::where('english_name', $shopName)->first();
    $shopCategories = $shop->ProductCategories()->get();
    $cart = \Auth::user()->cart()->get()->first();
    $total_price = $cart->total_price;
    $voucher = Voucher::where('code' , $request->code)->get()->first();
    $userID = \Auth::user()->id;
    $userVoucherName =  \Auth::user()->firstName .' '.   \Auth::user()->lastName . '-' . \Auth::user()->email;
    // code for this shop check
      if (Voucher::where([['code', $request->code], ['status', 1], ['expires_at', '>', now() ], ['starts_at', '<', now() ], ])->get()->first() == null) {
          alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
          return redirect()->back();
      }

      if (Voucher::where([['code', $request->code], ['status', 1], ['expires_at', '>', now() ], ['starts_at', '<', now() ], ])->get()->first()->shop_id == Shop::where('english_name', $shopName)->get()->first()->id) {

        //first purchase chekc
        if(Voucher::where('code', $request->code)->get()->first()->first_purchase == 'enable' and \Auth::user()->purchases()->where('shop_id', $shop->id)->get()->count() != 0){
          alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
          return redirect()->back();
        }

        //check if is not for certain users and its for all users
        if(Voucher::where([['code', $request->code], ['status', 1], ['expires_at', '>', now() ], ['starts_at', '<', now() ]])->get()->first()->users == null){
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
          $discountedPrice = $total_price - $voucherDiscountAmount;
          // dd($voucherDiscountAmount);
          $cartUpdate = $cart->update([
            'total_price' => $discountedPrice,
            ]);
           alert()->success('کد تخفیف شما باموفقیت اعمال شد.', 'ثبت شد');
          return redirect()->back();
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
            $discountedPrice = $total_price - $voucherDiscountAmount;
            $cartUpdate = $cart->update([
              'total_price' => $discountedPrice,
              ]);            alert()->success('کد تخفیف شما باموفقیت اعمال شد.', 'ثبت شد');
            return redirect()->back();
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
          foreach($request->except('_token') as $productId => $quantity){
            $product = Product::find($productId);
            if($product->off_price != null){
              $productPrice = $product->off_price;
            }
            else{
              $productPrice = $product->price;
            }
            if(RequestFacade::server('HTTP_REFERER') !== route('purchase-list',['shop'=>$shop->english_name, 'userID' => \Auth::user()->id])){
              DB::table('cart_product')->where([['cart_id', '=', $cart->id], ['product_id', '=', $productId]])->update(['quantity' => $quantity, 'total_price' => $productPrice * $quantity]);
            }
        }
        $total_price = 0;
        foreach($cart->cartProduct as $cartProduct){
          $total_price += $cartProduct->total_price;
        }
        $cartUpdate = $cart->update([
          'total_price' => $total_price,
          ]);
        return view("app.shop.$template_folderName..purchase-list", compact('shop', 'shopCategories', 'cart'));
      }





      public function purchaseSubmit($shopName, $cartID, Request $request) {
          $cart = \Auth::user()->cart()->get()->first();
          $shop = Shop::where('english_name', $shopName)->first();
          $total_price = \Auth::user()->cart()->get()->first()->total_price;
          // address and new addres validation condition
          if($cart->cartProduct[0]->type != 'file'){

          if (!isset($request->address)) {

              $request->validate(['new_address' => 'required', 'shipping_way' => 'required']);
          } else {

              $request->validate(['address' => 'required', 'shipping_way' => 'required']);
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

          if (Session::get(\Auth::user()->id .'-'. $shop->english_name) == null) {
            if($shop->VAT == 'enable') {
              $purchase->total_price = ($total_price) + ($total_price * $shop->VAT_amount / 100) + $shopShippingWayPrice;
            }
            else{
              $purchase->total_price = $total_price + $shopShippingWayPrice;
            }
          }

          else {
            $voucher = Voucher::where('code' , Session::get('voucher_code'))->get()->first();
            if($shop->VAT == 'enable') {
              $purchase->total_price = (Session::get(\Auth::user()->id .'-'. $shop->english_name)) + (Session::get(\Auth::user()->id .'-'. $shop->english_name) * $shop->VAT_amount / 100) + $shopShippingWayPrice;
            }
            else{
              $purchase->total_price = Session::get(\Auth::user()->id .'-'. $shop->english_name) + $shopShippingWayPrice;
            }
          }

          $purchase->save();
          // the only way that store data in pivot table to find that which user use which voucher in which shop is this if statement
          if(isset($voucher)){
            DB::table('user_vouchers')->insert(['user_id' => \Auth::user()->id, 'voucher_id' => $voucher->id, 'user_purchase_id' => $purchase->id, 'shop_id' => $shop->id]);
            Session::pull('voucher_code', $request->code);
          }
          Session::pull(\Auth::user()->id .'-'. $shop->english_name);
          DB::table('carts')->where('id', '=', \Auth::user()->cart()->get()->first()->id)->update(['status' => 1]);
          Cart::where('id', \Auth::user()->cart()->get()->first()->id)->get()->first()->delete();
          alert()->success('خرید شما با موفقیت ثبت شد', 'تبریک');
          SEOTools::setTitle($shop->name);
          SEOTools::setDescription($shop->description);
          SEOTools::opengraph()->addProperty('type', 'website');
          return redirect()->route('user.purchased.list', ['userID' => \auth::user()->id]);
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
