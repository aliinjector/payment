<?php

namespace App\Http\Controllers\Dashboard\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\Shop;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $appInformation = \Auth::user()->shop->application;

      $shop = \Auth::user()->shop()->first();
      return view('dashboard.shop.application' , compact('shop', 'appInformation'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $appInformation = \Auth::user()->shop->application->update([
        'title' => $request->title,
        'color_1' => $request->color_1,
        'color_2' => $request->color_2,
        'color_3' => $request->color_3
      ]);
      if(\Auth::user()->shop->tickets->where('title', 'درخواست اپلیکیشن')->first()->created_at < \Auth::user()->shop->application->updated_at){
        \Auth::user()->shop->tickets->where('title', 'درخواست اپلیکیشن')->first()->delete();
      }

      alert()->success('تنظیمات اپلیکیشن شما با موفقیت تغییر کرد.', 'ثبت شد');
      return redirect()->route('application.index');

    }



        public function applicatioRequest(){
          $ticket = Ticket::updateOrCreate(
              ['user_id' => \Auth::user()->id, 'shop_id' => \Auth::user()->shop->id, 'title' => 'درخواست اپلیکیشن', 'description' => 'درخواست اپلیکیشن', 'scope' => 'فروشگاه ساز', 'status' => 'بررسی نشده']
          );
          alert()->success('تیکت شما باموفقیت اضافه شد.', 'ثبت شد');
          return redirect()->back();
        }


        public function changeStatus(Request $request){
            $shop = Shop::where('english_name', $request->shop)->get()->first();

            $application = $shop->application;
            if($application->sell == "disable")
                $application->sell = "enable";
            else
                $application->sell = "disable";
            $application->save();
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
