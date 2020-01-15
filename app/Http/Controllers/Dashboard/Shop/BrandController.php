<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Brand;
use App\Shop;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
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
    public function store(Request $request)
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
                    $request->validate(['name' => 'required']);
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
                    $request->validate(['name' => 'required']);
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
    public function update(Request $request, $id)
    {
      //check if icon is null or not
      if($request->file('icon') == null){
        $icon = \Auth::user()->shop()->first()->brands()->where('id',$id)->get()->first()->icon;
      }
      else{
        $icon = $this->uploadFile($request->file('icon'), false, true);
      }
        $request->validate(['name' => 'required']);
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
      $brand = Brand::find($request->id);
      foreach($brand->icon as $icon){
        $icon = ltrim($icon, '/');
        unlink($icon);
      }
      $brand->update([
          'icon' => null
      ]);
    }


    public function brandProduct($shop, $name, Request $request) {
        $shop = Shop::where('english_name', $shop)->first();
        $shopTags = $shop->tags;
        $shopCategories = $shop->ProductCategories()->get();
        $brandName = Brand::where('name', $name)->get()->first()->name;
        $brands = $shop->brands;
        if ($request->has('type') and $request->has('sortBy') and $request->has('minprice') and $request->has('maxprice')) {
          $minPrice = $request->minprice;
          $maxPrice = $request->maxprice;
          $filterBy = $request->type;
          $sortBy = $request->sortBy['field'];
          if($shop->template->folderName == 2){
            $sortBy_array = explode('|', $request->sortBy['field']);
            $sortBy = $sortBy_array[0];
            $orderBy = $sortBy_array[1];
          }
          else{
            $orderBy = $request->sortBy['orderBy'];
          }
            $perPage = 8;
            if ($request->type == 'all') {
                $products = Brand::where('name', $name)->get()->first()->products()->where('shop_id', $shop->id)->orderBy($sortBy, $orderBy)->paginate($perPage);
            } else {
                $products = Brand::where('name', $name)->get()->first()->products()->where('shop_id', $shop->id)->where('type', $request->type)->orderBy($sortBy, $orderBy)->paginate($perPage);
            }
        } else {
            $products = Brand::where('name', $name)->get()->first()->products()->where('shop_id', $shop->id)->paginate(8);
        }
        $template_folderName = $shop->template->folderName;

        SEOTools::setTitle($shop->name . ' | ' . $brandName);
        SEOTools::setDescription($shop->description);
        SEOTools::opengraph()->addProperty('type', 'website');

        return view("app.shop.$template_folderName.brands-product", compact('products', 'shop', 'shopCategories', 'brandName', 'brands', 'shopTags'));
    }

}
