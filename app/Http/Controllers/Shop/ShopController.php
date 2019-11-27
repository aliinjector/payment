<?php
  namespace App\Http\Controllers\Shop;

  use App\Tag;
  use App\Shop;
  use App\Product;
  use App\Voucher;
  use App\ShopCategory;
  use App\UserPurchase;
  use App\Cart;
  use App\Rating;
  use App\ProductCategory;
  use Illuminate\Http\Request;
  use Request as RequestFacade;
  use Illuminate\Support\Facades\DB;
  use Illuminate\Support\Facades\URL;
  use App\Http\Controllers\Controller;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\Session;
  use Illuminate\Pagination\LengthAwarePaginator;
  use Artesaos\SEOTools\Facades\SEOTools;

  class ShopController extends \App\Http\Controllers\Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $discountedPrice;

    public function index($shop) {

      if (Shop::where('english_name', $shop)->first() == null) {
          return abort(404);
      }

      $shopCategories = Shop::where('english_name', $shop)->first()->ProductCategories()->get();
      $shop = Shop::where('english_name', $shop)->first();
      $lastProducts = $shop->products()->orderBy('created_at', 'DESC')->take(4)->get();
      $bestSelling = $shop->products()->orderBy('buyCount', 'DESC')->take(4)->get();
      $template_folderName = $shop->template->folderName;

      SEOTools::setTitle($shop->name . ' | ' . 'صفحه اصلی');
      SEOTools::setDescription($shop->description);
      SEOTools::opengraph()->addProperty('type', 'website');

      return view("app.shop.$template_folderName.index", compact('shop', 'lastProducts', 'shopCategories', 'bestSelling'));

    }


    public function showCategory($shop, $categroyId, Request $request) {
        $shop = Shop::where('english_name', $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        $categories = Shop::where('english_name', $shop->english_name)->first()->ProductCategories()->get()->where('parent_id', null);
        $category = ProductCategory::where('id', $categroyId)->get()->first();
        if ($request->has('type') and $request->has('sortBy') and $request->has('minprice') and $request->has('maxprice')) {
            $orderBy = $request->sortBy['orderBy'];
            $minPrice = $request->minprice;
            $maxPrice = $request->maxprice;
            $filterBy = $request->type;
            $sortBy = $request->sortBy['field'];
            $perPage = 8;
            if ($request->type == 'all') {
                if ($orderBy == 'desc') {
                    $products = $this->getAllCategoriesProducts((int)$categroyId)->whereBetween('price', [$minPrice, $maxPrice])->sortByDesc($sortBy);
                } else {
                    $products = $this->getAllCategoriesProducts((int)$categroyId)->whereBetween('price', [$minPrice, $maxPrice])->sortBy($sortBy);
                }
            } else {
                if ($orderBy == 'desc') {
                    $products = $this->getAllCategoriesProducts((int)$categroyId)->where('type', $filterBy)->whereBetween('price', [$minPrice, $maxPrice])->sortByDesc($sortBy);
                } else {
                    $products = $this->getAllCategoriesProducts((int)$categroyId)->where('type', $filterBy)->whereBetween('price', [$minPrice, $maxPrice])->sortBy($sortBy);
                }
            }
        } else {
            $products = $this->getAllCategoriesProducts((int)$categroyId);
        }
        $total = $products->count();
        $perPage = 16; // How many items do you want to display.
        $currentPage = request()->page; // The index page.
        $productsPaginate = new LengthAwarePaginator($products->forPage($currentPage, $perPage), $total, $perPage, $currentPage);
        SEOTools::setTitle($shop->name . ' | ' . ProductCategory::where('id', $categroyId)->get()->first()->name);
        $template_folderName = $shop->template->folderName;

        SEOTools::setDescription($shop->description);
        SEOTools::opengraph()->addProperty('type', 'website');

        return view("app.shop.$template_folderName.category", compact('products', 'shopCategories', 'shop', 'category', 'categories', 'productsPaginate'));
    }


    public function getAllCategoriesProducts($cat_id) {
        $allProducts = collect();
        foreach (ProductCategory::find($cat_id)->products()->get() as $product) {
            $allProducts[] = $product;
        }
        foreach (ProductCategory::find($cat_id)->children()->get() as $subCategory) {
            foreach ($subCategory->products()->get() as $product) {
                $allProducts[] = $product;
            }
            if ($subCategory->children()->exists()) {
                foreach ($subCategory->children()->get() as $subSubCategory) {
                    foreach ($subSubCategory->products()->get() as $product) {
                        $allProducts[] = $product;
                    }
                }
                if ($subSubCategory->children()->exists()) {
                    foreach ($subSubCategory->children()->get() as $subSubSubCategory) {
                        foreach ($subSubSubCategory->products()->get() as $product) {
                            $allProducts[] = $product;
                        }
                        if ($subSubSubCategory->children()->exists()) {
                            foreach ($subSubSubCategory->children()->get() as $subSubSubSubCategory) {
                                foreach ($subSubSubSubCategory->products()->get() as $product) {
                                    $allProducts[] = $product;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $allProducts;
    }


    public static function getAllSubCategories($cat_id) {
        $allSubCategories = collect();
        foreach (ProductCategory::find($cat_id)->children()->get() as $subCategory) {
            $allSubCategories[] = $subCategory;
            if ($subCategory->children()->exists()) {
                foreach ($subCategory->children()->get() as $subSubCategory) {
                    $allSubCategories[] = $subSubCategory;
                }
                if ($subSubCategory->children()->exists()) {
                    foreach ($subSubCategory->children()->get() as $subSubSubCategory) {
                        $allSubCategories[] = $subSubSubCategory;
                        if ($subSubSubCategory->children()->exists()) {
                            foreach ($subSubSubCategory->children()->get() as $subSubSubSubCategory) {
                                $allSubCategories[] = $subSubSubSubCategory;
                            }
                        }
                    }
                }
            }
        }
        return $allSubCategories;
    }



    public function purchaseList($shop, $id) {
        if (\Auth::guest()) {
            return redirect()->route('register');
        } else {
            $product = Product::where('id', $id)->get()->first();
            $shop = Shop::where('english_name', $shop)->first();
            $shopCategories = $shop->ProductCategories()->get();
            $template_folderName = $shop->template->folderName;

            SEOTools::setTitle($shop->name . ' | ' . 'لیست سفارشات');
            SEOTools::setDescription($shop->description);
            SEOTools::opengraph()->addProperty('type', 'website');

            return view("app.shop.$template_folderName.purchase-list", compact('shop', 'shopCategories', 'product'));
        }
    }


    public function tagProduct($shop, $name, Request $request) {
        $shop = Shop::where('english_name', $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        $tagName = Tag::where('name', $name)->get()->first()->name;
        if ($request->has('type') and $request->has('sortBy')) {
            $orderBy = $request->sortBy['orderBy'];
            $filterBy = $request->type;
            $sortBy = $request->sortBy['field'];
            $perPage = 16;
            if ($request->type == 'all') {
                $products = Tag::where('name', $name)->get()->first()->products()->where('shop_id', $shop->id)->orderBy($sortBy, $orderBy)->paginate($perPage);
            } else {
                $products = Tag::where('name', $name)->get()->first()->products()->where('shop_id', $shop->id)->where('type', $request->type)->orderBy($sortBy, $orderBy)->paginate($perPage);
            }
        } else {
            $products = Tag::where('name', $name)->get()->first()->products()->where('shop_id', $shop->id)->paginate(8);
        }
        $template_folderName = $shop->template->folderName;

        SEOTools::setTitle($shop->name . ' | ' . $tagName);
        SEOTools::setDescription($shop->description);
        SEOTools::opengraph()->addProperty('type', 'website');

        return view("app.shop.$template_folderName.tags-product", compact('products', 'shop', 'shopCategories', 'tagName'));
    }


    public function approved($shopName, $productId, Request $request) {
      $shop = Shop::where('english_name', $shopName)->first();
      $product = Product::where('id', $productId)->get()->first();
      $shopCategories = $shop->ProductCategories()->get();
      $total_price = \Auth::user()->cart()->get()->first()->total_price;
      $cart = \Auth::user()->cart()->get()->first()->id;
      $voucher = Voucher::where('code' , $request->code)->get()->first();
      $userID = \Auth::user()->id;
      $userVoucherName =  \Auth::user()->firstName .' '.   \Auth::user()->lastName . '-' . \Auth::user()->email;
        if (Voucher::where([['code', $request->code], ['status', 1], ['expires_at', '>', now() ], ['starts_at', '<', now() ], ])->get()->first() == null) {
            $productsID = [];
            $quantity = [];
            $productTotal_price = [];
            foreach (DB::table('cart_product')->where('cart_id', '=', $cart)->get() as $a) {
                $productsID[] = $a->product_id;
                $quantity[] = $a->quantity;
                $productTotal_price[] = $a->total_price;
            }
            $products = [];
            foreach ($productsID as $productID) {
                $product = Product::where('id', $productID)->get()->first();
                $products[] = $product;
            }
            alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');

            $template_folderName = $shop->template->folderName;

            return view("app.shop.$template_folderName.purchase-list", compact('shop', 'shopCategories', 'product', 'products', 'quantity', 'productTotal_price', 'total_price'));
        }
        if (Voucher::where([['code', $request->code], ['status', 1], ['expires_at', '>', now() ], ['starts_at', '<', now() ], ])->get()->first()->shop_id == Shop::where('english_name', $shopName)->get()->first()->id) {
          if(Voucher::where([['code', $request->code], ['status', 1], ['expires_at', '>', now() ], ['starts_at', '<', now() ], ])->get()->first()->users == null){
            $productsID = [];
            $quantity = [];
            $productTotal_price = [];
            foreach (DB::table('cart_product')->where('cart_id', '=', $cart)->get() as $a) {
                $productsID[] = $a->product_id;
                $quantity[] = $a->quantity;
                $productTotal_price[] = $a->total_price;
            }
            $products = [];
            foreach ($productsID as $productID) {
                $product = Product::where('id', $productID)->get()->first();
                $products[] = $product;
            }
            $cartTotalPrice = \Auth::user()->cart()->get()->first()->total_price;
            $voucherDiscount = Voucher::where('code', $request->code)->get()->first()->discount_amount;
            $discountedPrice = $cartTotalPrice - $voucherDiscount;
            Session::put( \Auth::user()->id .'-'. $shop->english_name, $discountedPrice);
            Session::put('voucher_code', $request->code);
            alert()->success('کد تخفیف شما باموفقیت اعمال شد.', 'ثبت شد');
            $template_folderName = $shop->template->folderName;

            return view("app.shop.$template_folderName.purchase-list", compact('shop', 'shopCategories', 'product', 'discountedPrice', 'voucherDiscount', 'products', 'quantity', 'productTotal_price', 'total_price'));
          }
          else{
            $voucherId = Voucher::where('code', $request->code)->get()->first()->id;
            if(collect($this->getVochersUsers($voucherId))->contains($userVoucherName)){
              $productsID = [];
              $quantity = [];
              $productTotal_price = [];
              foreach (DB::table('cart_product')->where('cart_id', '=', $cart)->get() as $a) {
                  $productsID[] = $a->product_id;
                  $quantity[] = $a->quantity;
                  $productTotal_price[] = $a->total_price;
              }
              $products = [];
              foreach ($productsID as $productID) {
                  $product = Product::where('id', $productID)->get()->first();
                  $products[] = $product;
              }
              $cartTotalPrice = \Auth::user()->cart()->get()->first()->total_price;
              $voucherDiscount = Voucher::where('code', $request->code)->get()->first()->discount_amount;
              $discountedPrice = $cartTotalPrice - $voucherDiscount;
              Session::put(\Auth::user()->id .'-'. $shop->english_name, $discountedPrice);
              Session::put('voucher_code', $request->code);
              alert()->success('کد تخفیف شما باموفقیت اعمال شد.', 'ثبت شد');
              $template_folderName = $shop->template->folderName;

              return view("app.shop.$template_folderName.purchase-list", compact('shop', 'shopCategories', 'product', 'discountedPrice', 'voucherDiscount', 'products', 'quantity', 'productTotal_price', 'total_price'));
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


    public function downlaodFile($shop, $id) {
        $product = Product::find($id);
        $purchase = $product->purchases()->get();
        if (\auth::user()) {
            $userPurchase = $purchase->where('user_id', \auth::user()->id);
        } else {
            $userPurchase = null;
        }
        if ($userPurchase->count() > 0) {
            return redirect(URL::temporarySignedRoute('download.link', now()->addMinutes(30), ['shop' => $shop, 'id' => $id]));
        } else {
            return redirect()->route('login');
        }
    }


    public function downlaodLink(Request $request, $shop, $id) {
        $this->approved($shop, $id, $request);
        if (!$request->hasValidSignature()) {
            abort(401);
        }
        $uri = Shop::where('english_name', $shop)->get()->first()->products()->where('id', $id)->get()->first()->attachment;
        $uri = ltrim($uri, '/');
        $shopId = Shop::where('english_name', $shop)->get()->first()->id;
        $product = Product::where('id', $id)->get()->first();
        $purchase = new UserPurchase;
        $purchase->product_id = $id;
        $purchase->shop_id = $shopId;
        if ($product->off_price == null) {
            if (Session::get(\Auth::user()->id .'-'. $shop->english_name) == null) {
                $purchase->total_price = $product->price;
            } else {
                $purchase->total_price = Session::get(\Auth::user()->id .'-'. $shop->english_name);
            }
        } else {
            $purchase->total_price = $product->off_price;
        }
        Session::pull(\Auth::user()->id .'-'. $shop->english_name);
        if (\Auth::guest()) {
            $purchase->user_id = null;
        } else {
            $purchase->user_id = \Auth::user()->id;
        }
        $purchase->save();
        return response()->file($uri);
    }


    public function purchaseSubmit($shop, $cartID, Request $request) {

        $total_price = \Auth::user()->cart()->get()->first()->total_price;
        $cart = \Auth::user()->cart()->get()->first()->id;
        $productsID = [];
        $quantity = [];
        $productTotal_price = [];
        foreach (DB::table('cart_product')->where('cart_id', '=', $cart)->get() as $a) {
            $productsID[] = $a->product_id;
            $quantity[] = $a->quantity;
            $productTotal_price[] = $a->total_price;
        }
        $products = [];
        foreach ($productsID as $productID) {
            $product = Product::where('id', $productID)->get()->first();
            $products[] = $product;
        }
        $cart = Cart::where('id', $cartID)->get()->first();
        $shopId = Shop::where('english_name', $shop)->get()->first()->id;
        if (!isset($request->address)) {
            $request->validate(['new_address' => 'required']);
        } else {
            $request->validate(['address' => 'required']);
        }
        if (isset(\Auth::user()->userInformation()->get()->first()->address)) {
            $userAddress1 = \Auth::user()->userInformation()->get()->first()->address;
        }
        if (isset(\Auth::user()->userInformation()->get()->first()->address_2)) {
            $userAddress2 = \Auth::user()->userInformation()->get()->first()->address_2;
        }
        if (isset(\Auth::user()->userInformation()->get()->first()->address_3)) {
            $userAddress3 = \Auth::user()->userInformation()->get()->first()->address_3;
        }
        $purchase = new UserPurchase;
        $purchase->cart_id = $cartID;
        $purchase->user_id = \Auth::user()->id;
        $purchase->shop_id = $shopId;
        if ($request->new_address == null) {
            if ($request->address == "address_1") {
                $purchase->address = $userAddress1;
            } elseif ($request->address == "address_2") {
                $purchase->address = $userAddress2;
            } elseif ($request->address == "address_3") {
                $purchase->address = $userAddress3;
            }
        } else {
            $purchase->address = $request->new_address;
        }
        $purchase->shipping = $request->shipping_way;
        $shop = Shop::where('english_name', $shop)->first();

        if (Session::get(\Auth::user()->id .'-'. $shop->english_name) == null) {

          if($shop->VAT == 'enable') {
            $purchase->total_price = (\Auth::user()->cart()->get()->first()->total_price) + (\Auth::user()->cart()->get()->first()->total_price * $shop->VAT_amount / 100);
          }
          else{
            $purchase->total_price = \Auth::user()->cart()->get()->first()->total_price;
          }
        }
        else {
          $voucher = Voucher::where('code' , Session::get('voucher_code'))->get()->first();
          if($shop->VAT == 'enable') {
            $purchase->total_price = (Session::get(\Auth::user()->id .'-'. $shop->english_name)) + (Session::get(\Auth::user()->id .'-'. $shop->english_name) * $shop->VAT_amount / 100);
          }
          else{
            $purchase->total_price = Session::get(\Auth::user()->id .'-'. $shop->english_name);
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


    public function userPurchaseList() {
        $purchases = \auth::user()->purchases()->orderBy('id', 'ASC')->get();
        $template_folderName = $shop->template->folderName;

        return view("app.shop.$template_folderName.user-purchased-list", compact('purchases'));
    }


    public function updateRate(Request $request) {
        $user = \auth::user();
        $product = Product::find($request->id);
        if (Rating::where([['author_id', $user->id], ['ratingable_id', $product->id]])->get()->count() == 0) {
            $rating = $product->rating(['rating' => $request->rate], $user);
            alert()->success('امتیاز شما با موفقیت ثبت شد', 'انجام شد');
            return redirect()->route('product', ['shop' => $request->shop, 'id' => $request->id]);
        } else {
            alert()->error('شما قبلا برای این محصول نظر ثبت کرده اید', 'خطا');
            return redirect()->route('product', ['shop' => $request->shop, 'id' => $request->id]);
        }
    }



    public function getVochersUsers($id){
    $shop = Shop::where('english_name', RequestFacade::segment(1))->get()->first();
    $users = $shop->vouchers()->where('id' , $id)->get()->first()->users;
    return $users;
    }
}
