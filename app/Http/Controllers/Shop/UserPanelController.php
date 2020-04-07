<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Shop;
use App\Http\Requests\UserPanelUpdateRequest;
use App\Http\Controllers\Controller;

class UserPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(\auth::user()->shop_id != null){
        $shop_name = Shop::where('id', \auth::user()->shop_id)->get()->first()->english_name;
        $shop = Shop::find(\auth()->user()->shop_id);
        $user = \auth()->user();
        return view("app.shop.account.user-panel", compact('shop_name', 'shop', 'user'));
      }
      else{
        $shop = \auth()->user()->shop;
        $shop_name = $shop->english_name;
        $user = \auth()->user();
        return view("app.shop.account.user-panel", compact('shop_name', 'shop', 'user'));
      }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(\auth::user()->shop_id != null){
        $shop_name = Shop::where('id', \auth::user()->shop_id)->get()->first()->english_name;
        $shop = Shop::find(\auth()->user()->shop_id);
        $user = \auth()->user();
        return view("app.shop.account.user-panel-edit", compact('shop_name', 'shop', 'user'));
      }
      else{
        $shop = \auth()->user()->shop;
        $shop_name = $shop->english_name;
        $user = \auth()->user();
        return view("app.shop.account.user-panel-edit", compact('shop_name', 'shop', 'user'));
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserPanelUpdateRequest $request, $id)
    {
      //check if icon is null or not
      if($request->file('avatar') != null){
        $avatar = $this->uploadFile($request->file('avatar'), false, false);
      }
      else{
        $avatar =  \Auth::user()->avatar;
      }
      $user = \Auth::user()->update([
      'firstName' => $request->firstName,
      'lastName' => $request->lastName,
      'email' => $request->email,
      'mobile' => $request->mobile,
      'avatar' => $avatar
      ]);

      alert()->success('اطلاعات شما با موفقیت ویرایش شد.', 'انجام شد');
      return redirect()->route('user-panel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
