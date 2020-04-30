<?php

namespace App\Http\Controllers\Shop;

use App\Shop;
use App\Product;
use App\Voucher;
use App\UserPurchase;
use App\UserVoucher;
use App\Cart;
use App\Address;
use Illuminate\Http\Request;
use Request as RequestFacade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\SpecificationItem;
use Illuminate\Support\Facades\Session;
use App\Notifications\NewPurchaseForShopOwner;
use App\Notifications\MinAmountWarning;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\PurchaseSubmitRequest;



class PurchaseController extends Controller
{

  public function approved($shopName, PurchaseRequest $request) {
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
          Session::put('voucher', 'false'.\auth::user()->id);
          alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
          return view("app.shop.$template_folderName..purchase-list", compact('shop', 'shopCategories', 'cart'));
      }
      if ($validVoucher != null and $validVoucher->shop_id == Shop::where('english_name', $shopName)->get()->first()->id) {

        //first purchase chekc
        if(Voucher::where('code', $request->code)->get()->first()->first_purchase == 'enable' and \Auth::user()->purchases()->where('shop_id', $shop->id)->get()->count() != 0){
          Session::put('voucher', 'false'.\auth::user()->id);
          alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
          return redirect()->back();
        }

        //check if is not for certain users and its for all users
        if($validVoucher != null and $validVoucher->users == null){
          // code is one time use and user use it before check
          if($voucher->disposable == 'enable'){
            $userVoucherUse = UserVoucher::where([['user_id', $userID], ['voucher_id', $voucher->id], ['shop_id', $shop->id]])->first();
            if($userVoucherUse){
              Session::put('voucher', 'false'.\auth::user()->id);
              alert()->error('شما قبلا از این کد تخفیف استفاده کردید.', 'خطا');
              return redirect()->back();
            }
          }

          //approved voucher and decrease price
          $disableDiscountCartPrice = 0;
          foreach ($cart->cartProduct as $cartProduct) {
          if($cartProduct->product->discount_status == 'disable'){
            $disableDiscountCartPrice += $cartProduct->total_price + $cartProduct->specification_price;
          }
          }
          $voucherDiscountAmount = Voucher::where('code', $request->code)->get()->first()->discount_amount;
          $voucherDiscountLimit = Voucher::where('code', $request->code)->get()->first()->discount_limit;
          if($voucher->type == 'number'){
          if((($total_price - $disableDiscountCartPrice)) == 0){
            $discountedPrice = $total_price;
            $discountPrice = 0;
            }
            else{
              $discountedPrice = (($total_price - $disableDiscountCartPrice) - $voucherDiscountAmount) + $disableDiscountCartPrice;
              $discountPrice = $total_price - $discountedPrice;
            }
        }
        else{
          if((($total_price - $disableDiscountCartPrice)) == 0){
            $discountedPrice = $total_price;
            $discountPrice = 0;
            }
            else{
              if($voucherDiscountLimit != 0){
                $discountedPrice = (($total_price - $disableDiscountCartPrice) - (($total_price - $disableDiscountCartPrice) * $voucherDiscountAmount / 100)) + $disableDiscountCartPrice;
                $discountPrice = $total_price - $discountedPrice;
                if($discountPrice > $voucherDiscountLimit){
                  $discountPrice = $voucherDiscountLimit;
                  $discountedPrice = $total_price - $voucherDiscountLimit;
                }
              }
              else{
                $discountedPrice = (($total_price - $disableDiscountCartPrice) - (($total_price - $disableDiscountCartPrice) * $voucherDiscountAmount / 100)) + $disableDiscountCartPrice;
                $discountPrice = $total_price - $discountedPrice;
              }
            }
        }
          if($discountedPrice < 0){
            $discountedPrice = 0;
            $discountPrice = $total_price;
          }
          if($cart->voucher_status == 'unused'){
            $cartUpdate = $cart->update([
              'total_price' => $discountedPrice,
              'total_off_price' => $discountPrice,
              'voucher_status' => 'used',
              'voucher_id' => $voucher->id,
              ]);
             alert()->success('کد تخفیف شما باموفقیت اعمال شد.', 'ثبت شد');
             return redirect()->back();
          }
          else{
            Session::put('voucher', 'false'.\auth::user()->id);
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
            $disableDiscountCartPrice = 0;
            $voucherDiscountAmount = Voucher::where('code', $request->code)->get()->first()->discount_amount;
            if($voucher->type == 'number'){
              if((($total_price - $disableDiscountCartPrice)) == 0){
                $discountedPrice = $total_price;
                $discountPrice = 0;

                }
                else{
                  $discountedPrice = (($total_price - $disableDiscountCartPrice) - $voucherDiscountAmount) + $disableDiscountCartPrice;
                  $discountPrice = $total_price - $discountedPrice;
                }
          }
          else{

            if((($total_price - $disableDiscountCartPrice)) == 0){
              $discountedPrice = $total_price;
              $discountPrice = 0;
              }
              else{
                if($voucherDiscountLimit != 0){
                  $discountedPrice = (($total_price - $disableDiscountCartPrice) - (($total_price - $disableDiscountCartPrice) * $voucherDiscountAmount / 100)) + $disableDiscountCartPrice;
                  $discountPrice = $total_price - $discountedPrice;
                  if($discountPrice > $voucherDiscountLimit){
                    $discountPrice = $voucherDiscountLimit;
                    $discountedPrice = $total_price - $voucherDiscountLimit;
                  }
                }
                else{
                $discountedPrice = (($total_price - $disableDiscountCartPrice) - (($total_price - $disableDiscountCartPrice) * $voucherDiscountAmount / 100)) + $disableDiscountCartPrice;
                $discountPrice = $total_price - $discountedPrice;
              }
            }
          }
            if($discountedPrice < 0){
              $discountedPrice = 0;
              $discountPrice = $total_price;
            }
            if($cart->voucher_status == 'unused'){
              $cartUpdate = $cart->update([
                'total_price' => $discountedPrice,
                'total_off_price' => $discountPrice,
                'voucher_status' => 'used',
                'voucher_id' => $voucher->id,
                ]);
               alert()->success('کد تخفیف شما باموفقیت اعمال شد.', 'ثبت شد');
               return redirect()->back();
            }
            else{
              alert()->error('شما قبلا از این کد تخفیف استفاده کردید.', 'خطا');
              return view("app.shop.$template_folderName.purchase-list", compact('shop', 'shopCategories', 'cart'));
            }
          }
          else{
            Session::put('voucher', 'false'.\auth::user()->id);
            alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
            return redirect()->back();
          }
        }
      } else {
          Session::put('voucher', 'false'.\auth::user()->id);
          alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
          return redirect()->back();
      }
  }




      public function purchaseList($shop, Request $request) {
        if(\Session::get('checkDirectAccess') != \auth::user()->id . \auth::user()->cart->id . \auth::user()->cart->created_at->timestamp){
          \abort('403');
        }
        else{
          Session::forget('checkDirectAccess');
        }
        if (\Auth::guest()) {
            return redirect()->route('register');
        }
        $cart = \Auth::user()->cart()->get()->first();
        $shop = Shop::where('english_name', $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        $template_folderName = $shop->template->folderName;

        if(app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() != 'purchase-list' and Session::get('voucher') != false){
        if(!$request->has('_token') or app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() != 'user-cart'){
          foreach ($cart->cartproduct as $singleCartproduct) {
            DB::table('cart_product')->where([['id', '=', $singleCartproduct->id], ['cart_id', '=', $cart->id], ['product_id', '=', $singleCartproduct->product->id]])->update(['quantity' => 1, 'total_price' => $singleCartproduct->product->price]);
          }
        }
      }
        else{
          Session::forget('voucher');
          foreach($request->except('_token') as $productIdAndCartProductId => $quantity){
          $productId = explode('-',$productIdAndCartProductId)[0];
          $cartProductId = explode('-',$productIdAndCartProductId)[1];
            $product = Product::findOrFail($productId);
            if($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now()){
              $productPrice = $product->off_price;
            }
            else{
              $productPrice = $product->price;
            }

            if(RequestFacade::server('HTTP_REFERER') !== route('purchase-list',['shop'=>$shop->english_name, 'userID' => \Auth::user()->id])){
              $singleCartProduct = DB::table('cart_product')->where([['id', '=', $cartProductId],['cart_id', '=', $cart->id], ['product_id', '=', $productId]])->get()->first();
              $specificationPrice = 0;

              if($singleCartProduct->specification != null){
                foreach(\json_decode($singleCartProduct->specification) as $specificationItem){
                  $specificationItem = SpecificationItem::findOrFail($specificationItem);
                  $specificationPrice += $specificationItem->price;
                }
              }

              DB::table('cart_product')->where([['id', '=', $cartProductId], ['cart_id', '=', $cart->id], ['product_id', '=', $productId]])->update(['quantity' => $quantity, 'total_price' => $productPrice * $quantity, 'specification_price' => $specificationPrice * $quantity]);
            }
        }
        }
        $total_price = 0;
        foreach($cart->cartProduct as $cartProduct){
          $total_price += $cartProduct->total_price + $cartProduct->specification_price;
        }
        if(app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() != 'purchase-list'){
        $cartUpdate = $cart->update([
          'total_price' => $total_price,
          'voucher_status' => 'unused',
          'voucher_id' => null,
          'total_off_price' => null,
          ]);
          }
          SEOTools::setTitle('پیش فاکتور');
          SEOTools::setDescription('پیش فاکتور');
          SEOTools::opengraph()->addProperty('type', 'website');
        return view("app.shop.$template_folderName.purchase-list", compact('shop', 'shopCategories', 'cart'));
      }





      public function purchaseSubmit($shopName, $cartID, PurchaseSubmitRequest $request) {

          $cart = \Auth::user()->cart()->get()->first();
          $shop = Shop::where('english_name', $shopName)->first();
          $shopOwner = $shop->user;
          $total_price = \Auth::user()->cart()->get()->first()->total_price;
          $productIds = collect();
          foreach($cart->cartProduct as $cartProduct){
            $productIds[] = $cartProduct->product_id;
          }
          foreach($productIds as $productId){
            if (Product::find($productId)->type == 'product' && Product::find($productId)->amount != null and Product::find($productId)->amount < 1 || Product::find($productId)->status == 'disable'){
                return redirect()->route('user-cart', ['shop' => $shop->english_name])->withErrors('با عرض پوزش محصول  ' . Product::find($productId)->title . ' موجود نمیباشد. لطفا از سبد خرید خود حذف نمایید.');
            }
            elseif(Product::find($productId)->type == 'product' && Product::find($productId)->amount == null){
              if(Product::find($productId)->color_amount_status == "enable" and Product::find($productId)->specification_amount_status == "disable"){
                foreach($cart->cartProduct as $cartProductSingle){
                      if($cartProductSingle->product->colors->where('id', $cartProductSingle->color->id)->first()->pivot->amount <= 0 or $cartProductSingle->product->colors->where('id', $cartProductSingle->color->id)->first()->pivot->amount <= $cartProductSingle->quantity or $cart->cartProduct->sum('quantity') >= $cartProductSingle->product->colors->where('id', $cartProductSingle->color->id)->first()->pivot->amount){
                          return redirect()->route('user-cart', ['shop' => $shop->english_name])->withErrors('با عرض پوزش محصول  ' . Product::find($productId)->title . ' موجود نمیباشد. لطفا از سبد خرید خود حذف نمایید.');
                      }
                    }
              }
              if(Product::find($productId)->specification_amount_status == "enable" and Product::find($productId)->color_amount_status == "disable"){
                foreach($cart->cartProduct as $cartProductSingle){
                  foreach(Product::find($productId)->specifications as $specificationSingleOrg){
                    foreach($specificationSingleOrg->items as $singleItem){
                      if($singleItem->productSpecificationItems->where('product_id',$productId)->first()->amount <= 0)
                      return redirect()->route('user-cart', ['shop' => $shop->english_name])->withErrors('با عرض پوزش محصول  ' . Product::find($productId)->title . ' دارای موجودی جدید میباشد. لطفا تعداد جدید انتخاب نمایید..');
                    }
                  }
                    }
              }
              if(Product::find($productId)->specification_amount_status == "enable" and Product::find($productId)->color_amount_status == "enable"){
                foreach($cart->cartProduct as $cartProductSingle){
                      if($cartProductSingle->product->colors->where('id', $cartProductSingle->color->id)->first()->pivot->amount <= 0 or $cartProductSingle->product->colors->where('id', $cartProductSingle->color->id)->first()->pivot->amount <= $cartProductSingle->quantity or $cart->cartProduct->sum('quantity') >= $cartProductSingle->product->colors->where('id', $cartProductSingle->color->id)->first()->pivot->amount){
                          return redirect()->route('user-cart', ['shop' => $shop->english_name])->withErrors('با عرض پوزش محصول  ' . Product::find($productId)->title . ' دارای موجودی جدید میباشد. لطفا تعداد جدید انتخاب نمایید..');
                      }
                      foreach(Product::find($productId)->specifications as $specificationSingleOrg){
                        foreach($specificationSingleOrg->items as $singleItem){
                          if($singleItem->productSpecificationItems->where('product_id',$productId)->first()->amount  <= $cartProductSingle->quantity or $cart->cartProduct->sum('quantity') >= $singleItem->productSpecificationItems->where('product_id',$productId)->first()->amount){
                          return redirect()->route('user-cart', ['shop' => $shop->english_name])->withErrors('با عرض پوزش محصول  ' . Product::find($productId)->title . ' دارای موجودی جدید میباشد. لطفا تعداد جدید انتخاب نمایید..');
                          }
                        }
                      }
                    }
              }
            }
            }
          foreach($productIds as $productId){
            if (Product::find($productId)->off_price != null and (Product::find($productId)->off_price_started_at > now() or Product::find($productId)->off_price_expired_at < now())){
              return redirect()->route('user-cart', ['shop' => $shop->english_name])->withErrors('با عرض پوزش محصول  ' . Product::find($productId)->title . ' از حالت تخفیف خارج شده است. درصورت نیاز به خرید با قیمت جدید , پس از گذشت یک دقیقه اقدام به خرید مجدد بفرمایید.');
            }
            }

          // address and new addres validation condition
          if($cart->cartProduct[0]->product->type != 'file'){

          if (!isset($request->address)) {

              $request->validate(['new_address' => 'required|max:250', 'shipping_way' => 'required|max:250']);
          } else {

              $request->validate(['address' => 'required|max:250', 'shipping_way' => 'required|max:250']);
          }
        }
        $shipping = $request->shipping_way;
        $shipping_price = $shipping.'_price';
        $shopShippingWayPrice = Shop::where('english_name', $shopName)->get()->first()->$shipping_price;
          $purchase = new UserPurchase;
          $purchase->cart_id = $cart->id;
          $purchase->user_id = \Auth::user()->id;
          $purchase->shop_id = $shop->id;
          $purchase->date = \Morilog\Jalali\Jalalian::forge('today')->format('%Y/%m/%d');
          // check if user send new address or select address from his addresses
          if ($request->new_address == null) {
            $purchase->address_id = $request->address;
              }
              else{
                if($request->zip_code != null){
                  $request->merge(['zip_code' => $this->fa_num_to_en($request->zip_code)]);
                }
                if($request->tel != null){
                  $request->merge(['tel' => $this->fa_num_to_en($request->tel)]);
                }
                if($request->type == 'product'){
                $request->validate([
                  'zip_code' => 'required_without:address|digits:10|nullable',
                  'tel' => 'required_without:address|regex:/^[0-9]+$/u|min:2|max:20',
            ]);
            }
            elseif($request->type == 'service'){
              $request->validate([
                'zip_code' => 'nullable|digits:10',
                'tel' => 'nullable|regex:/^[0-9]+$/u|min:2|max:20',
            ]);
            }
            else{
              $request->validate([
                'zip_code' => 'nullable|digits:10',
                'tel' => 'nullable|regex:/^[0-9]+$/u|min:2|max:20',
            ]);
            }
                $address = new Address;
                $address->city = $request->city;
                $address->province = $request->province;
                $address->zip_code = $request->zip_code;
                $address->tel = $request->tel;
                $address->address = $request->new_address;
                $address->user_id = \Auth::user()->id;
                $address->save();
                $purchase->address_id = $address->id;
              }
          $purchase->shipping = $request->shipping_way;
          $purchase->shipping_price = $shopShippingWayPrice;
          if($cart->cartProduct[0]->product->type == 'file'){
            $purchase->payment_method = 'online_payment';
          }else{
            $purchase->payment_method = $request->payment_method;
          }
            if($shop->VAT == 'enable') {
              $purchase->total_price = ($total_price) + ($total_price * $shop->VAT_amount / 100);
            }
            else{
              $purchase->total_price = $total_price;
            }
          $purchase->save();

          // add new address to user addresses

          // the only way that store data in pivot table to find that which user use which voucher in which shop is this if statement
          if($cart->voucher_status == 'used'){
            DB::transaction(function () use ($cart, $purchase, $shop) {
            DB::table('user_vouchers')->insert(['user_id' => \Auth::user()->id, 'voucher_id' => $cart->voucher_id, 'user_purchase_id' => $purchase->id, 'shop_id' => $shop->id]);
            DB::table('vouchers')->where('id', '=', $cart->voucher_id)->decrement('uses');
          });
          }
          DB::transaction(function () {
          DB::table('carts')->where('id', '=', \Auth::user()->cart()->get()->first()->id)->update(['status' => 1]);
          Cart::where('id', \Auth::user()->cart()->get()->first()->id)->get()->first()->delete();
        });



          foreach($cart->cartProduct as $cartProductSingle){

            // color amount decrement
            if(Product::find($cartProductSingle->product_id)->color_amount_status == "enable"){
                $cartProductSingle->product->colors->where('id', $cartProductSingle->color->id)->first()->pivot->update(['amount' => DB::raw('amount - ' .$cartProductSingle->quantity)]);
          }


          // specification amount decrement
          if(Product::find($cartProductSingle->product_id)->specification_amount_status	 == "enable"){
            $specificationItems = collect();
            foreach($cartProductSingle->specification as $specification){
              $specificationItem = SpecificationItem::find($specification);
              $specificationItems[] = $specificationItem;
            }
            foreach($cartProductSingle->specification as $specificationId){
              foreach($specificationItems->where('id', $specificationId)->unique('id') as $specificationItem){
                    $specificationItem->productSpecificationItems->where('product_id', $cartProductSingle->product->id)->first()->update(['amount' => DB::raw('amount - ' .$cartProductSingle->quantity)]);
            }
          }
          }
          }

          foreach($productIds as $productId){
            Product::find($productId)->increment('buyCount');
            if(Product::find($productId)->amount == null and Product::find($productId)->type = "product"){

            }else{
              foreach($cart->cartProduct as $cartProductSingle){
                Product::find($productId)->decrement('amount', Product::find($productId)->cartProduct->where('cart_id', $cart->id)->first()->quantity);
              }
            }
            if(Product::find($productId)->type == 'product' and Product::find($productId)->amount != null and Product::find($productId)->amount <= Product::find($productId)->min_amount){
            $details = [
                  'message' => ' موجودی کالای ' . Product::find($productId)->title . ' درحال اتمام میباشد ',
                  'url' => 'product-list.index'
              ];
            $shopOwner->notify(new MinAmountWarning($details));
            }
          }
          $details = [
                'message' => 'یک سفارش جدید ثبت شد',
                'url' => 'purchases.index'
            ];
          $shopOwner->notify(new NewPurchaseForShopOwner($details));

          toastr()->success('خرید شما با موفقیت ثبت شد');
          return redirect()->route('user.purchased.list');
      }




          public function getVochersUsers($id){
          $shop = Shop::where('english_name', RequestFacade::segment(1))->get()->first();
          $users = $shop->vouchers()->where('id' , $id)->get()->first()->users;
          return $users;
          }



          public function getShippingPrice(Request $request){
            $request->validate([
              'type' => 'required|in:posting_way_price,person_way_price,quick_way_price',
              'shop' => 'required|min:1|max:10000000000|regex:/^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}$/',
        ]);
        if($request->shop != explode('/',$request->url())[3]){
          alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
          return redirect()->back();
        }
            $typePrice = $request->type;
            $shippingPrice = Shop::where('english_name', $request->shop)->get()->first()->$typePrice;
            return response()->json($shippingPrice);

          }
}
