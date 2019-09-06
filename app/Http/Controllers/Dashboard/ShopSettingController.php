<?php

namespace App\Http\Controllers\Dashboard;

use App\Dashboard;
use Illuminate\Http\Request;
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
      // if(\Auth::user()->userInformation()->count() == 0){
      //     $userInformation = new UserInformation;
      //     $shopContact->shop_id = 1;
      //     $shopContact->tel = $request->tel;
      //     $shopContact->phone =  \Auth::user()->mobile;
      //     $shopContact->shop_email = $request->shop_email;
      //     $shopContact->address = $request->address;
      //     $shopContact->city = $request->city;
      //     $shopContact->province = $request->province;
      //     $shopContact->telegram_url = $request->telegram_url;
      //     $shopContact->instagram_url = $request->instagram_url;
      //     $shopContact->facebook_url = $request->facebook_url;
      //     $userInformation->save();
      // }
      // $userInformation = \Auth::user()->userInformation()->first();
      //
      $categories = ShopCategory::all();
      return view('dashboard.shop-setting', compact('categories'));
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
      $shopContact = new ShopContact;
      $shopContact->shop_id = 1;
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
      alert()->success('تیکت شما باموفقیت اضافه شد.', 'ثبت شد');
      return redirect()->route('shop-setting.index');
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
    public function update(Request $request)
    {
      $shop =  Shop::where('user_id', \Auth::user()->id)->first();
      $shop->title = $request->title;
      $shop->user_id = \Auth::user()->id;
      $shop->cat_id = $request->cat_id;
      $shop->contact_id = 2;
      $shop->status = 0;
      $shop->quick_way = "enable";
      $shop->posting_way = "enable";
      $shop->person_way = "enable";
      $shop->description = $request->description;
      $shop->icon = "w";
      $shop->logo = "w";
      $shop->save();

      alert()->success('تیکت شما باموفقیت اضافه شد.', 'ثبت شد');
      return redirect()->route('shop-setting.index');


    }
    public function updateContact(Request $request){
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

      alert()->success('تیکت شما باموفقیت اضافه شد.', 'ثبت شد');
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
