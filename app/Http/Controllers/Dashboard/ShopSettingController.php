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
      $shopContactInformation = $shopInformation->shopContact()->get();
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

      $shop = \Auth::user()->shop()->get()->update([
        'title' => $request->title,
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

      $shop = \Auth::user()->shop()->get()->shopContact()->get()->update([
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
