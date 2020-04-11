<?php

namespace App\Http\Controllers\Shop;

use App\Address;
use App\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Http\Controllers\Controller;


class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user_addresses = \auth()->user()->addresses;
      if(\Auth::user()->type == 'customer'){
        $shop = Shop::find(\auth()->user()->shop_id);
        SEOTools::setTitle('لیست ادرس ها');
        SEOTools::setDescription('لیست ادرس ها');
        SEOTools::opengraph()->addProperty('type', 'website');
        return view("app.shop.account.account-address", compact('user_addresses', 'shop'));
      }
      else{
        SEOTools::setTitle('لیست ادرس ها');
        SEOTools::setDescription('لیست ادرس ها');
        SEOTools::opengraph()->addProperty('type', 'website');
        return view("app.shop.account.account-address", compact('user_addresses'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $shop = Shop::find(\auth()->user()->shop_id);
      SEOTools::setTitle('افزودن آدرس جدید');
      SEOTools::setDescription('افزودن آدرس جدید');
      SEOTools::opengraph()->addProperty('type', 'website');
      return view("app.shop.account.account-address-create", compact('shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {
      if($request->zip_code != null){
        $request->merge(['zip_code' => $this->fa_num_to_en($request->zip_code)]);
      }

      $request->validate([
        'zip_code' => 'required|digits:10',
  ]);
      $address = new Address;
      $address->city = $request->city;
      $address->province = $request->province;
      $address->zip_code = $this->fa_num_to_en($request->zip_code);
      $address->address = $request->address;
      $address->user_id = \Auth::user()->id;
      $address->save();
      alert()->success('آدرس جدید شما باموفقیت اضافه شد.', 'ثبت شد');
      return redirect()->route('user-address.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(\auth::user()->type == 'customer'){
        $shop = Shop::find(\auth()->user()->shop_id);
      }
      else{
        $address = \auth()->user()->addresses->where('id', $id)->first();
        SEOTools::setTitle('ویرایش آدرس ' . $address->address);
        SEOTools::setDescription('لیست ادرس ها');
        SEOTools::opengraph()->addProperty('type', 'website');
        return view("app.shop.account.account-address-edit", compact('address'));
      }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, $id)
    {
      if (!\Auth::user()->addresses()->find($id)->get()){
          alert()->error('خطا', 'خطا');
          return redirect()->route('user-address.index');
          exit;
      }

      $user_address = \Auth::user()->addresses()->where('id', $id)->first()->update([
      'city' => $request->city,
      'province' => $request->province,
      'zip_code' => $request->zip_code,
      'address' => $request->address,
      ]);


      alert()->success('آدرس شما با موفقیت ویرایش شد.', 'انجام شد');
      return redirect()->route('user-address.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $request->validate([
        'id' => 'required|numeric|min:1|max:10000000000',
    ]);
      $address = Address::find($request->id);
      if ($address->user_id !== \Auth::user()->id) {
              alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
              return redirect()->back();
            }

               $address->delete();
               alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
               return redirect()->back();
    }
}
