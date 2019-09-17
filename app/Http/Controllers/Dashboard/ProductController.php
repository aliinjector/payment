<?php
namespace App\Http\Controllers\Dashboard;

use App\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;
use App\ProductCategory;
use App\Product;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (\Auth::user()->shop()->first()->ProductCategories()->get()->count() == 0) {
        alert()->warning('هدایت به صفحه ساخت دسته بندی', 'لطفا ابتدا دسته بندی جدید ایجاد کنید');
        return redirect()->route('product-category.index');
      }
      else{
        $productCategories = \Auth::user()->shop()->first()->ProductCategories()->get();
        $products = \Auth::user()->shop()->first()->products()->get();
        return view('dashboard.product', compact('productCategories','products'));
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
     public function storeProduct(ProductRequest $request)
       {
      $image = $this->uploadFile($request->file('image'), false, false);
      if($request->type == 'file')
      $attachment = $this->uploadFile($request->file('attachment'), false, false);
      else
      $attachment = null;
      if ( $request->enable != "on")
      $request->enable = 0;
     else
     $request->enable = 1;
     if($request->color_2 == '#a89d8e')
      $request->color_2 = null;
      else
      $request->color_2 = $request->color_2;

      if($request->color_3 == '#a89d8e')
       $request->color_3 = null;
       else
       $request->color_3 = $request->color_3;

      if($request->color_4 == '#a89d8e')
       $request->color_4 = null;
       else
       $request->color_4 = $request->color_4;

      if($request->color_5 == '#a89d8e')
       $request->color_5 = null;
       else
       $request->color_5 = $request->color_5;

       if ( $request->fast_sending != "on")
         $request->fast_sending = 0;
      else
      $request->fast_sending = 1;

       if ( $request->money_back != "on")
         $request->money_back = 0;
      else
      $request->money_back = 1;

       if ( $request->support != "on")
         $request->support = 0;
      else
      $request->support = 1;

       if ( $request->secure_payment != "on")
         $request->secure_payment = 0;
      else
      $request->secure_payment = 1;
      $shop = \Auth::user()->shop()->first()->products()->create([
        'title' => $request->title,
        'status' => $request->enable,
        'type' => $request->type,
        'color_1' => $request->color_1,
        'productCat_id' => $request->product_category,
        'color_2' => $request->color_2,
        'color_3' => $request->color_3,
        'color_4' => $request->color_4,
        'color_5' => $request->color_5,
        'amount' => $request->amount,
        'weight' => $request->weight,
        'price' => $request->price,
        'fast_sending' => $request->fast_sending,
        'money_back' => $request->money_back,
        'support' => $request->support,
        'secure_payment' => $request->secure_payment,
        'feature_1' => $request->feature_1,
        'feature_2' => $request->feature_2,
        'feature_3' => $request->feature_3,
        'feature_4' => $request->feature_4,
        'description' => $request->description,
        'image' => $image,
        'attachment' => $attachment,
        'description' => $request->description,
        'file_size' => $request->file_size,
      ]);
      alert()->success('محصول جدید شما باموفقیت اضافه شد.', 'ثبت شد');
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

    public function showProduct($productCategory ,$productId)
    {
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
     public function destroy(Request $request)
    {
      $ProductCategory = \Auth::user()->shop()->first()->products()->where('id' , $request->id)->first()->delete();

             // if ($product->shop->user_id !== \Auth::user()->id) {
             //     alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
             //     return redirect()->back();
             // }

              // $product->delete();
              alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
              return redirect()->back();
          }
    }
