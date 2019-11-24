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
    public function index() {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create(array $data) {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
    }
    /**
     * Display the specified resource.
     *
     * @param \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function show($shop) {
        if (Shop::where('english_name', $shop)->first() == null) {
            return abort(404);
        }
        $shopCategories = Shop::where('english_name', $shop)->first()->ProductCategories()->get();
        $shop = Shop::where('english_name', $shop)->first();
        $lastProducts = $shop->products()->orderBy('created_at', 'DESC')->take(4)->get();
        $bestSelling = $shop->products()->orderBy('buyCount', 'DESC')->take(4)->get();
        SEOTools::setTitle($shop->name . ' | ' . 'صفحه اصلی');
        SEOTools::setDescription($shop->description);
        SEOTools::opengraph()->addProperty('type', 'website');
        return view('app.shop.shop', compact('shop', 'lastProducts', 'shopCategories', 'bestSelling'));
    }
    public function showProduct($shop, $id) {
        if (Shop::where('english_name', $shop)->first() == null || Shop::where('english_name', $shop)->first()->products()->where('id', $id)->first() == null) {
            return abort(404);
        }
        $shop = Shop::where('english_name', $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        $product = $shop->products()->where('id', $id)->first();
        $productRates = $product->rates()->get();
        $userProducts = [];
        if (\auth::user()) {
            foreach (\auth::user()->cart()->withTrashed()->where('status', 1)->get() as $cart) {
                foreach ($cart->products() as $single_product) {
                    $userProducts[] = $single_product;
                }
            }
        }
        $comments = $product->comments;
        $galleries = $product->galleries->take(4);
        $offeredProducts = $shop->products()->where('productCat_id', $product->productCat_id)->orderBy('created_at', 'DESC')->take(4)->get();
        SEOTools::setTitle($shop->name . ' | ' . $product->title);
        SEOTools::setDescription($shop->name);
        SEOTools::opengraph()->addProperty('type', 'website');
        return view('app.shop.product-detail', compact('product', 'shop', 'shopCategories', 'productRates', 'userProducts', 'comments', 'galleries', 'offeredProducts'));
    }
    public function showCategory($shop, $categroyId, Request $request) {
        $shop = Shop::where('english_name', $shop)->first();
        $shopCategories = $shop->ProductCategories()->get();
        $categories = Shop::where('english_name', $shop->english_name)->first()->ProductCategories()->get()->where('parent_id', null);
        $category = ProductCategory::where('id', $categroyId)->get()->first()->id;
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
                  // dd($products);
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
        SEOTools::setDescription($shop->description);
        SEOTools::opengraph()->addProperty('type', 'website');
        return view('app.shop.category', compact('products', 'shopCategories', 'shop', 'category', 'categories', 'productsPaginate'));
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
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop) {
        //

    }
    public function purchaseList($shop, $id) {
        if (\Auth::guest()) {
            return redirect()->route('register');
        } else {
            $product = Product::where('id', $id)->get()->first();
            $shop = Shop::where('english_name', $shop)->first();
            $shopCategories = $shop->ProductCategories()->get();
            SEOTools::setTitle($shop->name . ' | ' . 'لیست سفارشات');
            SEOTools::setDescription($shop->description);
            SEOTools::opengraph()->addProperty('type', 'website');
            return view('app.shop.purchase-list', compact('shop', 'shopCategories', 'product'));
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
        SEOTools::setTitle($shop->name . ' | ' . $tagName);
        SEOTools::setDescription($shop->description);
        SEOTools::opengraph()->addProperty('type', 'website');
        return view('app.shop.tags-product', compact('products', 'shop', 'shopCategories', 'tagName'));
    }
    public function approved($shopName, $productId, Request $request) {
        if (Voucher::where([['code', $request->code], ['status', 1], ['expires_at', '>', now() ], ['starts_at', '<', now() ], ])->get()->first() == null) {
            $shop = Shop::where('english_name', $shopName)->first();
            $product = Product::where('id', $productId)->get()->first();
            $shopCategories = $shop->ProductCategories()->get();
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
            alert()->error('کد تخفیف شما معتبر نیست.', 'خطا');
            return view('app.shop.purchase-list', compact('shop', 'shopCategories', 'product', 'products', 'quantity', 'productTotal_price', 'total_price'));
        }
        if (Voucher::where([['code', $request->code], ['status', 1], ['expires_at', '>', now() ], ['starts_at', '<', now() ], ])->get()->first()->shop_id == Shop::where('english_name', $shopName)->get()->first()->id) {
            $shop = Shop::where('english_name', $shopName)->first();
            $product = Product::where('id', $productId)->get()->first();
            $shopCategories = $shop->ProductCategories()->get();
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
            $cartTotalPrice = \Auth::user()->cart()->get()->first()->total_price;
            $voucherDiscount = Voucher::where('code', $request->code)->get()->first()->discount_amount;
            $discountedPrice = $cartTotalPrice - $voucherDiscount;
            Session::put('discountedPrice', $discountedPrice);
            alert()->success('کد تخفیف شما باموفقیت اعمال شد.', 'ثبت شد');
            return view('app.shop.purchase-list', compact('shop', 'shopCategories', 'product', 'discountedPrice', 'voucherDiscount', 'products', 'quantity', 'productTotal_price', 'total_price'));
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
            if (Session::get('discountedPrice') == null) {
                $purchase->total_price = $product->price;
            } else {
                $purchase->total_price = Session::get('discountedPrice');
            }
        } else {
            $purchase->total_price = $product->off_price;
        }
        Session::pull('discountedPrice');
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

        if (Session::get('discountedPrice') == null) {
          if($shop->VAT == 'enable') {
            $purchase->total_price = (\Auth::user()->cart()->get()->first()->total_price) + (\Auth::user()->cart()->get()->first()->total_price * $shop->VAT_amount / 100);
          }
          else{
            $purchase->total_price = \Auth::user()->cart()->get()->first()->total_price;
          }
        }
        else {
          if($shop->VAT == 'enable') {
            $purchase->total_price = (Session::get('discountedPrice')) + (Session::get('discountedPrice') * $shop->VAT_amount / 100);
          }
          else{
            $purchase->total_price = Session::get('discountedPrice');
          }
        }
        $purchase->save();
        Session::pull('discountedPrice');
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
        return view('app.shop.user-purchased-list', compact('purchases'));
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
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop) {
        //

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop) {
        //

    }
}
