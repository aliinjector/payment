<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Feature;
use App\ProductCategory;
use App\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\FeatureRequest;
use App\Http\Controllers\Controller;


class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if(\Auth::user()->type == 'customer'){
          return redirect()->back();
      }
      else{
              $category = ProductCategory::find($request->cat_id);
              $shop = \Auth::user()->shop()->first();
              $productCategories = \Auth::user()->shop()->first()->ProductCategories()->doesntHave('children')->get();
              $categoryFeatures = $category->features;
              return view('dashboard.shop.feature.index', compact('shop', 'productCategories','category','categoryFeatures'));

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
    public function store(FeatureRequest $request)
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
                  $feature = new Feature;
                  $feature->name = $request->name;
                  $feature->productCat_id = $request->productCat_id;
                  $feature->icon = $icon;
                  $feature->save();
                  alert()->success('ویژگی جدید برای دسته بندی شما با موفقیت اضافه شد.', 'ثبت شد');
                  return redirect()->back();
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
                  return redirect()->back();
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
    public function edit(Request $request, $productCategoryFeatureid)
    {
      $shop = \Auth::user()->shop()->first();
      $category = ProductCategory::find($request->cat_id);
      $productCategoryFeature = \Auth::user()->shop()->first()->ProductCategories()->where('id', $request->cat_id)->get()->first()->features->find($productCategoryFeatureid);
      return view('dashboard.shop.feature.edit', compact('productCategoryFeature','category','shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureRequest $request, $productCategoryFeatureid)
    {
      if($request->file('icon') == null){
        $icon = null;
      }
      else{
        $icon = $this->uploadFile($request->file('icon'), false, true);
      }
        $productCategoryFeature = \Auth::user()->shop()->first()->ProductCategories()->where('id', $request->cat_id)->get()->first()->features->find($productCategoryFeatureid)->update([
                'name' => $request->name,
                'icon' => $icon
            ]);

    alert()->success('ویرایش ویژگی ها با موفقیت انجام شد.', 'ثبت شد');
    return redirect()->route('feature.index', ['cat_id' => $request->cat_id]);
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
