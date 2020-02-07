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
  use App\CartProduct;
  use App\ProductCategory;
  use Illuminate\Http\Request;
  use Request as RequestFacade;
  use Illuminate\Support\Facades\DB;
  use Illuminate\Support\Facades\URL;
  use App\Http\Controllers\Controller;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\Session;
  use Artesaos\SEOTools\Facades\SEOTools;
  use Illuminate\Support\Facades\Storage;
  use Illuminate\Http\File;

  class ShopController extends \App\Http\Controllers\Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $discountedPrice;

    public function index($shopName) {

      if (Shop::where('english_name', $shopName)->first() == null) {
          return abort(404);
      }

      $shopCategories = Shop::where('english_name', $shsopName)->first()->ProductCategories()->get();
      if(Shop::where('english_name', $shopName)->first()->slide_category != null){
        $slideCategoryNames = array_slice(Shop::where('english_name', $shopName)->first()->slide_category, 0, 3);
        $slideCategories = [];
        foreach($slideCategoryNames as $slideCategoryName){
          $category = Shop::where('english_name', $shopName)->first()->ProductCategories()->where('name', $slideCategoryName)->get()->first();
           $slideCategories[] =  $category;
        }
      }
      else{
        $slideCategories = null;
      }

      $shop = Shop::where('english_name', $shopName)->first();
      $lastProducts = $shop->products()->orderBy('created_at', 'DESC')->take(4)->get();
      $bestSelling = $shop->products()->orderBy('buyCount', 'DESC')->take(4)->get();
      $mostView = $shop->products()->orderBy('viewCount', 'DESC')->take(4)->get();
      $hasDescount = $shop->products()->whereNotNull('off_price')->take(4)->get();
      $template_folderName = $shop->template->folderName;
      $brands = $shop->brands;
      $feedbacks = $shop->feedbacks;
      $slideshows = $shop->slideshows;
      SEOTools::setTitle($shop->name . ' | ' . 'صفحه اصلی');
      SEOTools::setDescription($shop->description);
      SEOTools::opengraph()->addProperty('type', 'website');

      return view("app.shop.$template_folderName.index", compact('shop', 'lastProducts','hasDescount' ,'mostView', 'shopCategories', 'bestSelling', 'brands', 'feedbacks', 'slideshows','slideCategories'));

    }


    public function downlaodFile($shop, $id, $purchaseId) {
        $product = Product::find($id);
        $purchase = UserPurchase::where('id', $purchaseId)->get();

        // dd($purchase->first()->cart()->withTrashed()->get()->first()->products()->where('id', $id)->first());

        if (\auth::user()) {
            $userPurchase = $purchase->where('user_id', \auth::user()->id);

        } else {
            $userPurchase = null;
        }
        if ($userPurchase->count() > 0) {
          if(CartProduct::where([['cart_id', $purchase->first()->cart()->withTrashed()->get()->first()->id],['product_id', $id]])->get()->first()->download_status == 0){
            CartProduct::where([['cart_id', $purchase->first()->cart()->withTrashed()->get()->first()->id],['product_id', $id]])->get()->first()->update(['download_status' => '1']);
            return redirect(URL::temporarySignedRoute('download.link', now()->addMinutes(1), ['shop' => $shop, 'id' => $id]));
          }
          else{
            toastr()->error(' شما قبلا این فایل را دانلود کرده اید.', 'خطا');
            return redirect()->back();
          }
        } else {
            return redirect()->route('login');
        }
    }


    public function downlaodLink(Request $request, $shopName, $id) {
        if (!$request->hasValidSignature()) {
            abort(401);
        }
        $uri = Shop::where('english_name', $shopName)->get()->first()->products()->where('id', $id)->get()->first()->attachment;
        $shopId = Shop::where('english_name', $shopName)->get()->first()->id;
        $product = Product::where('id', $id)->get()->first();
        $fileName = explode("_", $uri, 3);
        if (\Auth::guest()) {
          abort(401);
        }else{
          return Storage::download($uri,$fileName[2]);
        }
    }






      public function registerShow($shopName)
      {
          if (Shop::where('english_name', $shopName)->first() == null) {
              return abort(404);
          }

          $shopCategories = Shop::where('english_name', $shopName)->first()->ProductCategories()->get();
          $shop = Shop::where('english_name', $shopName)->first();
          $template_folderName = $shop->template->folderName;

          SEOTools::setTitle($shop->name . ' | ' . 'صفحه اصلی');
          SEOTools::setDescription($shop->description);
          SEOTools::opengraph()->addProperty('type', 'website');

          return view("app.shop.$template_folderName.register", compact('shop', 'shopCategories'));

      }

      public function register(UserRequest $request, $shopName)
      {
          $shop = Shop::where('english_name', $shopName)->first();
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


      public function login($shopName)
      {
          if (Shop::where('english_name', $shopName)->first() == null) {
              return abort(404);
          }

          $shopCategories = Shop::where('english_name', $shopName)->first()->ProductCategories()->get();
          $shop = Shop::where('english_name', $shopName)->first();
          $template_folderName = $shop->template->folderName;

          SEOTools::setTitle($shop->name . ' | ' . 'صفحه اصلی');
          SEOTools::setDescription($shop->description);
          SEOTools::opengraph()->addProperty('type', 'website');

          return view("app.shop.$template_folderName.login", compact('shop', 'shopCategories'));

      }



      public function contact($shopName)
      {
          if (Shop::where('english_name', $shopName)->first() == null) {
              return abort(404);
          }

          $shopCategories = Shop::where('english_name', $shopName)->first()->ProductCategories()->get();
          $shop = Shop::where('english_name', $shopName)->first();
          $template_folderName = $shop->template->folderName;

          SEOTools::setTitle($shop->name . ' | ' . 'صفحه اصلی');
          SEOTools::setDescription($shop->description);
          SEOTools::opengraph()->addProperty('type', 'website');

          return view("app.shop.$template_folderName.contact", compact('shop', 'shopCategories'));

      }

      public function showFaq($shopName){
        $shop = Shop::where('english_name', $shopName)->get()->first();
        $shopCategories = Shop::where('english_name', $shopName)->first()->ProductCategories()->get();
        $shopFaqs = $shop->faqs;
        $template_folderName = $shop->template->folderName;

        return view("app.shop.$template_folderName.faq", compact('shop','shopCategories', 'shopFaqs'));
      }


}
