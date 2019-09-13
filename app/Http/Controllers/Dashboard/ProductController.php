<?php
namespace App\Http\Controllers\Dashboard;

use App\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;
use App\ProductCategory;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $productCategories = \Auth::user()->shop()->first()->categories()->get();
      $products = \Auth::user()->shop()->first()->products()->get();
      return view('dashboard.product', compact('productCategories','products'));


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
    public function storeProduct(Request $request)
    {
      $image = $this->uploadFile($request->file('image'), false, false);
      $product = new Product;
      $product->title = $request->title;
      $product->shop_id = \Auth::user()->shop()->first()->id;
      $product->productCat_id = $request->productCat_id;
      if ( $request->enable != "on")
        $product->status = 0;
     else
     $product->status = 1;
      $product->type = $request->type;
      $product->color_1 = $request->color_1;
      if($request->color_2 == '#a89d8e')
       $product->color_2 = null;
       else
       $product->color_2 = $request->color_2;

      if($request->color_3 == '#a89d8e')
       $product->color_3 = null;
       else
       $product->color_3 = $request->color_3;

      if($request->color_4 == '#a89d8e')
       $product->color_4 = null;
       else
       $product->color_4 = $request->color_4;

      if($request->color_5 == '#a89d8e')
       $product->color_5 = null;
       else
       $product->color_5 = $request->color_5;

      $product->amount = $request->amount;
      $product->weight = $request->weight;
      $product->price = $request->price;
      if ( $request->fast_sending != "on")
        $product->fast_sending = 0;
     else
     $product->fast_sending = 1;
      if ( $request->money_back != "on")
        $product->money_back = 0;
     else
     $product->money_back = 1;
      if ( $request->support != "on")
        $product->support = 0;
     else
     $product->support = 1;
      if ( $request->secure_payment != "on")
        $product->secure_payment = 0;
     else
     $product->secure_payment = 1;
      $product->feature_1 = $request->feature_1;
      $product->feature_2 = $request->feature_2;
      $product->feature_3 = $request->feature_3;
      $product->feature_4 = $request->feature_4;
      $product->description = $request->description;
      $product->image = $image;
      $product->save();
      alert()->success('محصول جدید شما باموفقیت اضافه شد.', 'ثبت شد');
      return redirect()->route('product-list.index');
    }

    public function storeFile(Request $request)
    {
      $image = $this->uploadFile($request->file('image'), false, false);
      $attachment = $this->uploadFile($request->file('attachment'), false, false);
      $product = new Product;
      $product->title = $request->title;
      $product->shop_id = \Auth::user()->shop()->first()->id;
      $product->productCat_id = $request->productCat_id;
      if ( $request->enable != "on")
        $product->status = 0;
     else
     $product->status = 1;
      $product->type = $request->type;
      $product->file_size = $request->file_size;
      $product->price = $request->price;
      $product->description = $request->description;
      $product->image = $image;
      $product->attachment = $attachment;
      $product->save();
      alert()->success('فایل جدید شما باموفقیت اضافه شد.', 'ثبت شد');
      return redirect()->route('product-list.index');
    }
    public function storeService(Request $request)
    {
      $image = $this->uploadFile($request->file('image'), false, false);
      $product = new Product;
      $product->title = $request->title;
      $product->shop_id = \Auth::user()->shop()->first()->id;
      $product->productCat_id = $request->productCat_id;
       if ( $request->enable != "on")
         $product->status = 0;
      else
      $product->status = 1;
      $product->type = $request->type;
      $product->price = $request->price;
      $product->description = $request->description;
      $product->image = $image;
      $product->save();
      alert()->success('فایل جدید شما باموفقیت اضافه شد.', 'ثبت شد');
      return redirect()->route('product-list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Product::find($id);
      return view('dashboard.product-detail', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
     public function destroy(Product $product, Request $request)
    {
      $product = Product::find($request->id);

             if ($product->shop->user_id !== \Auth::user()->id) {
                 alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
                 return redirect()->back();
             }

              $product->delete();
              alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
              return redirect()->back();
          }
    }
