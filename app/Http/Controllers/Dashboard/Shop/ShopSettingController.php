<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Dashboard;
use Illuminate\Http\Request;
use App\Http\Requests\ShopSettingRequest;
use App\Http\Requests\ShopContactRequest;
use App\Http\Requests\ShopThemeRequest;
use App\ErrorLog;
use App\Http\Controllers\Controller;
use App\Shop;
use App\Template;
use App\Invoice;
use App\ShopCategory;
use App\ShopContact;

class ShopSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
        {
          $templates = Template::all();
            if(\Auth::user()->type == 'customer'){
                return redirect()->back();
            }
          //check if there is no shop for logged in user
          if(\Auth::user()->shop()->count() == 0){
              $shop = new Shop;
              $shop->name = "نام تست";
              $shop->english_name = \Auth::user()->id;
              $shop->user_id = \Auth::user()->id;
              $shop->category_id = 1;
              $shop->status = 0;
              $shop->quick_way = "disable";
              $shop->posting_way = "disable";
              $shop->person_way = "disable";
              $shop->cash_payment = "enable";
              $shop->online_payment = "enable";
              $shop->template_id = 1;
              $shop->description = "توضیحات تست";
              $shop->save();

              // new shop Invoice
              $shopContact = new Invoice;
              $shopContact->shop_id = \Auth::user()->shop()->first()->id;
              $shopContact->save();

              // new shop contact
              $shopContact = new ShopContact;
              $shopContact->shop_id = \Auth::user()->shop()->first()->id;
              $shopContact->phone =  \Auth::user()->mobile;
              $shopContact->city = "تهران";
              $shopContact->province = "تهران";
              $shopContact->save();
          }
          $shopCategories = ShopCategory::all();
          $shopInformation = \Auth::user()->shop()->first();
          $shopContactInformation = $shopInformation->shopContact()->first();
          $categories = ShopCategory::all();
          return view('dashboard.shop.shop-setting', compact('categories','shopInformation','shopContactInformation','shopCategories', 'templates'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShopSetting  $shopSetting
     * @return \Illuminate\Http\Response
     */
    public function show(ShopSetting $shopSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShopSetting  $shopSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopSetting $shopSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShopSetting  $shopSetting
     * @return \Illuminate\Http\Response
     */
    public function update(ShopSettingRequest $request)
    {

      if(!isset($request->icon)){
      $icon = \Auth::user()->shop()->first()->icon;
      }
      else{
       $icon = $this->uploadFile($request->file('icon'), false, true);
      }
      if(!isset($request->logo)){
      $logo = \Auth::user()->shop()->first()->logo;
      }
      else{
      $logo = $this->uploadFile($request->file('logo'), false, true);
      }


        if (\Auth::user()->shop()->first()->english_name == $request->english_name) {
          //check for unique name for shop
            $request->validate([
              'english_name' => 'required|regex:/^[a-zA-Z0-9]+-?[a-zA-Z0-9]+-?[a-zA-Z0-9]+$/'
        ]);
        }
        else{
            $request->validate([
                  'english_name' => 'required|unique:shops|regex:/^[a-zA-Z0-9]+-?[a-zA-Z0-9]+-?[a-zA-Z0-9]+$/'
            ]);
        }
        if ( $request->quick_way != "on")
        $request->quick_way = 'disable';
     else
     $request->quick_way = 'enable';

        if ( $request->posting_way != "on")
        $request->posting_way = 'disable';
     else
     $request->posting_way = 'enable';

        if ( $request->person_way != "on")
        $request->person_way = 'disable';
     else
     $request->person_way = 'enable';

        if ( $request->online_payment != "on")
        $request->online_payment = 'disable';
     else
     $request->online_payment = 'enable';

        if ( $request->cash_payment != "on")
        $request->cash_payment = 'disable';
     else
     $request->cash_payment = 'enable';


      $shop = \Auth::user()->shop()->first()->update([
        'name' => $request->name,
        'english_name' => $request->english_name,
        'user_id' => \Auth::user()->id,
        'status' => 0,
        'quick_way' => $request->quick_way,
        'quick_way_price' => $request->quick_way_price,
        'posting_way' => $request->posting_way,
        'posting_way_price' => $request->posting_way_price,
        'person_way' => $request->person_way,
        'person_way_price' => $request->person_way_price,
        'cash_payment' => $request->cash_payment,
        'online_payment' => $request->online_payment,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'icon' => $icon,
        'logo' => $logo,
      ]);
      alert()->success('تغییرات شما باموفقیت اضافه شد.', 'ثبت شد');
      return redirect()->route('shop-setting.index');
    }




    public function updateContact(ShopContactRequest $request){
      $shop = \Auth::user()->shop()->first()->shopContact()->get()->first()->update([
        'tel' => $request->tel,
        'shop_email' => $request->shop_email,
        'address' => $request->address,
        'city' => $request->city,
        'province' => $request->province,
        'telegram_url' => $request->telegram_url,
        'instagram_url' => $request->instagram_url,
        'facebook_url' => $request->facebook_url,
        'soroush_url' => $request->soroush_url,
        'bisphone_url' => $request->bisphone_url,
        'Igap_url' => $request->Igap_url,
        'gap_url' => $request->gap_url,
        'wispi_url' => $request->wispi_url,
        'bale_url' => $request->bale_url,
        'lat' => $request->lat,
        'lng' => $request->lng,
      ]);

      alert()->success('تغییرات شما باموفقیت اضافه شد.', 'ثبت شد');
      return redirect()->route('shop-setting.index');
    }


    public function updateSetting(ShopThemeRequest $request){
      if($request->file('watermark') == null){
        $watermark = \Auth::user()->shop()->first()->watermark;
      }
      else{
        $watermark = $this->uploadFile($request->file('watermark'), false, false);
      }

      if(isset($request->slide_category))
      $slide_category = $request->slide_category;
      else
      $slide_category = null;

      $shop = \Auth::user()->shop()->first()->update([
        'menu_show' => $request->menu_show,
        'menu_show_count' => $request->menu_show_count,
        'slide_category' => $slide_category,
        'cat_image_status' => $request->cat_image_status,
        'watermark_status' => $request->watermark_status,
        'buyCount_show' => $request->buyCount_show,
        'watermark' => $watermark,
        'special_offer' => $request->special_offer,
        'template_id' => $request->template_id,
        'special_offer_text' => $request->special_offer_text,
        'VAT' => $request->VAT,
      ]);
      alert()->success('تغییرات شما باموفقیت اضافه شد.', 'ثبت شد');
      return redirect()->route('shop-setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShopSetting  $shopSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopSetting $shopSetting)
    {
        //
    }

    public function destroyImage(Request $request){
      $shop = Shop::find($request->id);
      if($request->type == 'icon'){
        $shop->update([
            'icon' => null
        ]);
      }
      else{
        $shop->update([
            'logo' => null
        ]);
      }
    }
}
