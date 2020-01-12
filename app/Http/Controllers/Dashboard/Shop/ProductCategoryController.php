<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductCategory;
use App\Http\Requests\ProductCategoryRequest;


class ProductCategoryController extends Controller
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
        }else{
      $shop = \Auth::user()->shop()->first();
      $categoires = \Auth::user()->shop()->first()->ProductCategories()->get();
      $parentCategories = \Auth::user()->shop()->first()->ProductCategories()->get()->where('parent_id', null);
        return view('dashboard.shop.product-category', compact('categoires' , 'shop','parentCategories'));
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

      //check if icon is null or not
      if($request->file('icon') == null){
        $image = null;
      }
      else{
        $image = $this->uploadFile($request->file('icon'), false, true);
      }
        switch ($request->input('action')) {
          //save and close modal
            case 'justSave':
                    $request->validate(['name' => 'required']);
                    $productCategory = new ProductCategory;
                    $productCategory->name = $request->name;
                    if($request->parent_id == 'null')
                      $productCategory->parent_id = null;
                    else
                    $productCategory->parent_id = $request->parent_id;
                    $productCategory->description = $request->description;
                    $productCategory->icon = $image;
                    $productCategory->shop_id = \Auth::user()->shop()->first()->id;
                    $productCategory->save();
                    alert()->success('دسته بندی جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                    return redirect()->route('product-category.index');
                break;
            //save and open new modal
            case 'saveAndContinue':
                    $request->validate(['name' => 'required']);
                    $productCategory = new ProductCategory;
                    $productCategory->name = $request->name;
                    if($request->parent_id == 'null')
                      $productCategory->parent_id = null;
                    else
                    $productCategory->parent_id = $request->parent_id;
                    $productCategory->description = $request->description;
                    $productCategory->icon = $image;
                    $productCategory->shop_id = \Auth::user()->shop()->first()->id;
                    $productCategory->save();
                    session()->flash('flashModal');
                    alert()->success('دسته بندی جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                    return redirect()->route('product-category.index');
                break;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //check if icon is null or not
      if($request->file('icon') == null){
        $image = \Auth::user()->shop()->first()->ProductCategories()->where('id',$id)->get()->first()->icon;
      }
      else{
        $image = $this->uploadFile($request->file('icon'), false, true);
      }
      if($request->parent_id == 'null'){
        $request->parent_id = null;
        }
        $request->validate(['name' => 'required']);
        $productCategory = \Auth::user()->shop()->first()->ProductCategories()->where('id',$id)->get()->first()->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'icon' => $image
        ]);


        alert()->success(' دسته بندی شما با موفقیت ویرایش شد.', 'ثبت شد');
        return redirect()->route('product-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory , Request $request)
    {
      $productCategory = ProductCategory::find($request->id);
      if ($productCategory->shop->user_id !== \Auth::user()->id) {
              alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
              return redirect()->back();
            }
               $productCategory->delete();
               alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
               return redirect()->back();
           }

     public function destroyIcon(Request $request){
       $productCategory = ProductCategory::find($request->id);
       foreach($productCategory->icon as $icon){
         $icon = ltrim($icon, '/');
         unlink($icon);
       }
       $productCategory->update([
           'icon' => null
       ]);
     }
}
