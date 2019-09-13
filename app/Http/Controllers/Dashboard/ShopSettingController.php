<?php

namespace App\Http\Controllers\Dashboard;

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
      if(!\Auth::user()->shop()->get()){

          $shop = \Auth::user()->shop()->create([
            'title' => "عنوان تست",
            'user_id' => \Auth::user()->id,
            'status' => 0,
            'quick_way' => "disable",
            'posting_way' => "disable",
            'person_way' => "disable",
            'description' => "توضیحات تست",
          ]);


          $shop->shopContact()->create([
            'shop_id' => \Auth::user()->shop()->first()->id,
            'phone' =>  \Auth::user()->mobile,
            'city' => "تهران",
            'province' => "تهران",
          ]);


      }

      $shopInformation = \Auth::user()->shop()->get();
      $shopContactInformation = $shopInformation->shopContact()->first();
      return view('dashboard.shop-setting', compact('shopInformation','shopContactInformation'));
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
      $shop =  Shop::where('user_id', \Auth::user()->id)->first();
      $shop->title = $request->title;
      $shop->user_id = \Auth::user()->id;
      $shop->cat_id = $request->cat_id;
      $shop->status = 0;
      $shop->quick_way = "enable";
      $shop->posting_way = "enable";
      $shop->person_way = "enable";
      $shop->description = $request->description;
      $shop->icon = $icon;
      $shop->logo = $logo;
      $shop->save();

      alert()->success('تغییرات شما باموفقیت اضافه شد.', 'ثبت شد');
      return redirect()->route('shop-setting.index');
    }



    public function updateContact(ShopContactRequest $request){
      $shopContact =  ShopContact::where('shop_id', \Auth::user()->shop()->first()->id)->first();
      $shopContact->shop_id = \Auth::user()->shop()->first()->id;
      $shopContact->tel = $request->tel;
      $shopContact->phone =  \Auth::user()->mobile;
      $shopContact->shop_email = $request->shop_email;
      $shopContact->address = $request->address;
      $shopContact->city = $request->city;
      $shopContact->province = $request->province;
      $shopContact->telegram_url = $request->telegram_url;
      $shopContact->instagram_url = $request->instagram_url;
      $shopContact->facebook_url = $request->facebook_url;
      $shopContact->save();

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
