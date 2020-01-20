<?php
  namespace App\Http\Controllers\Shop;

  use App\Http\Requests\UserRequest;
  use App\Tag;
  use App\Shop;
  use App\Product;
  use App\User;
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
      $slideCategoryNames = array_slice(Shop::where('english_name', $shop)->first()->slide_category, 0, 3);
      $slideCategories = [];
      foreach($slideCategoryNames as $slideCategoryName){
        $category = Shop::where('english_name', $shop)->first()->ProductCategories()->where('name', $slideCategoryName)->get()->first();
         $slideCategories[] =  $category;
      }
      $shop = Shop::where('english_name', $shop)->first();
      $lastProducts = $shop->products()->orderBy('created_at', 'DESC')->take(4)->get();
      $bestSelling = $shop->products()->orderBy('buyCount', 'DESC')->take(4)->get();
      $template_folderName = $shop->template->folderName;
      $brands = $shop->brands;
      $feedbacks = $shop->feedbacks;
      $slideshows = $shop->slideshows;
      SEOTools::setTitle($shop->name . ' | ' . 'صفحه اصلی');
      SEOTools::setDescription($shop->description);
      SEOTools::opengraph()->addProperty('type', 'website');

      return view("app.shop.$template_folderName.index", compact('shop', 'lastProducts', 'shopCategories', 'bestSelling', 'brands', 'feedbacks', 'slideshows','slideCategories'));

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

      public function registerShow($shop)
      {
          if (Shop::where('english_name', $shop)->first() == null) {
              return abort(404);
          }

          $shopCategories = Shop::where('english_name', $shop)->first()->ProductCategories()->get();
          $shop = Shop::where('english_name', $shop)->first();
          $template_folderName = $shop->template->folderName;

          SEOTools::setTitle($shop->name . ' | ' . 'صفحه اصلی');
          SEOTools::setDescription($shop->description);
          SEOTools::opengraph()->addProperty('type', 'website');

          return view("app.shop.$template_folderName.register", compact('shop', 'shopCategories'));

      }

      public function register(UserRequest $request, $shop)
      {
          $shop = Shop::where('english_name', $shop)->first();
          $user = User::create([
              'firstName' => $request['firstName'],
              'lastName' => $request['lastName'],
              'mobile' => $request['mobile'],
              'email' => $request['email'],
              'type' => 'customer',
              'shop_id' => $request['shop_id'],
              'password' => \Hash::make($request['password']),
          ]);

          alert()->success('حساب کاربری ایجاد شد.', 'انجام شد');
          return redirect()->route('shop', ['shop' => $shop->english_name]);

      }


      public function login($shop)
      {
          if (Shop::where('english_name', $shop)->first() == null) {
              return abort(404);
          }

          $shopCategories = Shop::where('english_name', $shop)->first()->ProductCategories()->get();
          $shop = Shop::where('english_name', $shop)->first();
          $template_folderName = $shop->template->folderName;

          SEOTools::setTitle($shop->name . ' | ' . 'صفحه اصلی');
          SEOTools::setDescription($shop->description);
          SEOTools::opengraph()->addProperty('type', 'website');

          return view("app.shop.$template_folderName.login", compact('shop', 'shopCategories'));

      }



      public function contact($shop)
      {
          if (Shop::where('english_name', $shop)->first() == null) {
              return abort(404);
          }

          $shopCategories = Shop::where('english_name', $shop)->first()->ProductCategories()->get();
          $shop = Shop::where('english_name', $shop)->first();
          $template_folderName = $shop->template->folderName;

          SEOTools::setTitle($shop->name . ' | ' . 'صفحه اصلی');
          SEOTools::setDescription($shop->description);
          SEOTools::opengraph()->addProperty('type', 'website');

          return view("app.shop.$template_folderName.contact", compact('shop', 'shopCategories'));

      }


}
