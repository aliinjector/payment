<?php

namespace App\Http\Controllers\Shop;

use App\Address;
use Illuminate\Http\Request;
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
      return view("app.shop.account.account-address", compact('user_addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("app.shop.account.account-address-create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate(['city' => 'required','province' => 'required','zip_code' => 'required','zip_code' => 'digits:10','address' => 'required']);
      $address = new Address;
      $address->city = $request->city;
      $address->province = $request->province;
      $address->zip_code = $request->zip_code;
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
      $address = Address::find($id);
      return view("app.shop.account.account-address-edit", compact('address'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if (!\Auth::user()->addresses()->find($id)->get()){
          alert()->error('خطا', 'خطا');
          return redirect()->route('user-address.index');
          exit;
      }

      $request->validate(['city' => 'required','province' => 'required','zip_code' => 'required','zip_code' => 'digits:10','address' => 'required']);
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
