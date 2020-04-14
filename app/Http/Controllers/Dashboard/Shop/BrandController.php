<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Brand;
use App\Shop;
use App\ErrorLog;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = \Auth::user()->shop()->first();
        $brands = \Auth::user()->shop()->first()->brands;
        SEOTools::setTitle($shop->name . ' | برندها');
        SEOTools::setDescription($shop->name);
        SEOTools::opengraph()->addProperty('type', 'website');
        return view('dashboard.shop.brand' , compact('brands' , 'shop'));
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
    public function store(BrandRequest $request)
    {
      //check if icon is null or not
      if($request->file('icon') == null){
        $icon = null;
      }
      else{
        $icon = $this->uploadFile($request->file('icon'), false, true);
      }
        switch ($request->input('action')) {
          //save and close modal
            case 'justSave':
                    $brand = new Brand;
                    $brand->name = $request->name;
                    $brand->icon = $icon;
                    $brand->shop_id = \Auth::user()->shop()->first()->id;
                    $brand->save();
                    alert()->success('برند جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                    return redirect()->route('brand.index');
                break;
            //save and open new modal
            case 'saveAndContinue':
                    $brand = new Brand;
                    $brand->name = $request->name;
                    $brand->icon = $icon;
                    $brand->shop_id = \Auth::user()->shop()->first()->id;
                    $brand->save();
                    session()->flash('flashModal');
                    alert()->success('برند جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                    return redirect()->route('brand.index');
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
      //check if icon is null or not
      if($request->file('icon') == null){
        $icon = \Auth::user()->shop()->first()->brands()->where('id',$id)->get()->first()->icon;
      }
      else{
        $icon = $this->uploadFile($request->file('icon'), false, true);
      }
        $productCategory = \Auth::user()->shop()->first()->brands()->where('id',$id)->get()->first()->update([
            'name' => $request->name,
            'icon' => $icon
        ]);


        alert()->success('برند شما با موفقیت تغییر کرد.', 'ثبت شد');
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
     public function destroy(Brand $brand , Request $request)
     {
       $request->validate([
         'id' => 'required|numeric|min:1|max:10000000000|regex:/^[0-9]+$/u',
   ]);
       $brand = Brand::find($request->id);
       if ($brand->shop->user_id !== \Auth::user()->id) {
               alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
               return redirect()->back();
             }
                $brand->delete();
                alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
                return redirect()->back();
    }


    public function destroyIcon(Request $request){
      $request->validate([
        'id' => 'required|numeric|min:1|max:10000000000|regex:/^[0-9]+$/u',
  ]);
      $brand = Brand::find($request->id);
      if ($brand->shop->user_id !== \Auth::user()->id) {
              alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
              return redirect()->back();
            }
      foreach($brand->icon as $icon){
        $icon = ltrim($icon, '/');
        unlink($icon);
      }
      $brand->update([
          'icon' => null
      ]);
    }



}
