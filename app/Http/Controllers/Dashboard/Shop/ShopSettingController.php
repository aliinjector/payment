<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Dashboard;
use Illuminate\Http\Request;
use App\Http\Requests\ShopSettingRequest;
use App\Http\Requests\ShopContactRequest;
use App\Http\Controllers\Controller;
use App\Shop;
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
          if(\Auth::user()->shop()->count() == 0){
              $shop = new Shop;
              $shop->name = "نام تست";
              $shop->english_name = \Auth::user()->id;
              $shop->user_id = \Auth::user()->id;
              $shop->status = 0;
              $shop->quick_way = "disable";
              $shop->posting_way = "disable";
              $shop->person_way = "disable";
              $shop->description = "توضیحات تست";
              $shop->save();
              $shopContact = new ShopContact;
              $shopContact->shop_id = \Auth::user()->shop()->first()->id;
              $shopContact->phone =  \Auth::user()->mobile;
              $shopContact->city = "تهران";
              $shopContact->province = "تهران";
              $shopContact->save();
          }
          $shopInformation = \Auth::user()->shop()->first();
          $shopContactInformation = $shopInformation->shopContact()->first();
          $categories = ShopCategory::all();
          return view('dashboard.shop.shop-setting', compact('categories','shopInformation','shopContactInformation'));
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
      $icon = $this->uploadFile($request->file('icon'), false, false);
      $logo = $this->uploadFile($request->file('logo'), false, false);
      $shop = \Auth::user()->shop()->first()->update([
        'name' => $request->name,
        'english_name' => $request->english_name,
        'user_id' => \Auth::user()->id,
        'status' => 0,
        'quick_way' => "disable",
        'posting_way' => "disable",
        'person_way' => "disable",
        'description' => $request->description,
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
}
