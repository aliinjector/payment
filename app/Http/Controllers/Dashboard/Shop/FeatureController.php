<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Feature;
use App\ProductCategory;
use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(\Auth::user()->type == 'customer'){
          return redirect()->back();
      }
      else{
              $shop = \Auth::user()->shop()->first();
              $productCategories = \Auth::user()->shop()->first()->ProductCategories()->doesntHave('children')->get();
              return view('dashboard.shop.feature.index', compact('categoires' , 'shop', 'productCategories'));

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
                  $feature = new Feature;
                  $feature->name = $request->name;
                  $feature->productCat_id = $request->productCat_id;
                  $feature->icon = $icon;
                  $feature->save();
                  alert()->success('ویژگی جدید برای دسته بندی شما با موفقیت اضافه شد.', 'ثبت شد');
                  return redirect()->route('feature.index');
              break;
          //save and open new modal
          case 'saveAndContinue':
                  $request->validate(['name' => 'required']);
                  $feature = new Feature;
                  $feature->name = $request->name;
                  $feature->productCat_id = $request->productCat_id;
                  $feature->icon = $icon;
                  $feature->save();
                  session()->flash('flashModal');
                  alert()->success('ویژگی جدید برای دسته بندی شما با موفقیت اضافه شد.', 'ثبت شد');
                  return redirect()->route('feature.index');
              break;

      }
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $productCategoryid)
    {
      $productCategory = \Auth::user()->shop()->first()->ProductCategories()->where('id', $productCategoryid)->get()->first();
      return view('dashboard.shop.feature.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productCategoryid)
    {
            for ($i=0; $i < $request->featureCount; $i++) {
              if(isset($request->file('icon')[$i])){
                if($request->file('icon')[$i] == null){
                  $icon = null;
                }
                else{
                  $icon = $this->uploadFile($request->file('icon')[$i], false, true);
                }
              }
              else{
                $icon = \Auth::user()->shop()->first()->ProductCategories()->where('id',$productCategoryid)->get()->first()->features->where('id', $request->featureId[$i])->first()->icon;
              }
              $request->validate(['name' => 'required']);
              $productCategory = \Auth::user()->shop()->first()->ProductCategories()->where('id',$productCategoryid)->get()->first()->features->where('id', $request->featureId[$i])->first()->update([
                'name' => $request->name[$i],
                'icon' => $icon
            ]);

          };

    alert()->success('ویرایش ویژگی ها با موفقیت انجام شد.', 'ثبت شد');
    return redirect()->route('feature.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature, Request $request)
    {
      $feature = Feature::find($request->id);
      if ($feature->productCategory->shop->user_id !== \Auth::user()->id) {
              alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
              return redirect()->back();
            }
               $feature->delete();
               alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
               return redirect()->back();
    }
}
