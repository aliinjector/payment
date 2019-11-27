<?php
namespace App\Http\Controllers\Dashboard\Shop;

use App\Tag;
use App\Shop;
use App\Product;
use App\Dashboard;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        if(\Auth::user()->type == 'customer'){
            return redirect()->back();
        }else{
          if (\Auth::user()->shop()->first()->ProductCategories()->get()->count() == 0) {
              alert()->warning('هدایت به صفحه ساخت دسته بندی', 'لطفا ابتدا دسته بندی جدید ایجاد کنید');
              return redirect()->route('product-category.index');
          }
          else{
              $productCategories = \Auth::user()->shop()->first()->ProductCategories()->doesntHave('children')->get();
              $brands = \Auth::user()->shop()->first()->brands()->get();
              $products = \Auth::user()->shop()->first()->products()->get();
              return view('dashboard.shop.product', compact('productCategories','products', 'brands'));
              }
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
         //check if product category is null
         if($request->productCat_id == "null"){
           $request->merge(['productCat_id' => null]);
         }
         if($request->brand_id == "null"){
           $request->merge(['brand_id' => null]);
         }
         //validate product category if is null or not
         $request->validate(['productCat_id' => 'required']);
         //check if product is file to calculate size of uploaded file
           if($request->type == 'file') {
            $file_size = $request->file('attachment')->getSize();
           }
           else{
            $file_size = null;
           }
      $image = $this->uploadFile($request->file('image'), false, true);
      //check if product is file to save attachment file
      if($request->type == 'file')
      $attachment = $this->uploadFile($request->file('attachment'), false, false);
      else
      $attachment = null;
      //check if enable if off to change enable to 0
      if ( $request->enable != "on")
      $request->enable = 0;
     else
     $request->enable = 1;
     //get colors
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
       //check options of products
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
      //check amount of product and change fa number to en
      if($request->amount != null){
        $request->amount = $this->fa_num_to_en($request->amount);
      }
      //check weight of product and change fa number to en
      if($request->weight != null){
        $request->weight = $this->fa_num_to_en($request->weight);
      }
      //check off_price of product and change fa number to en
      if($request->off_price != null){
        $request->off_price = $this->fa_num_to_en($request->off_price);
      }
      switch ($request->input('action')) {
        //save new product and close model
        case 'justSave':
      $shop = \Auth::user()->shop()->first()->products()->create([
        'title' => $request->title,
        'type' => $request->type,
        'color_1' => $request->color_1,
        'productCat_id' => $request->productCat_id,
        'brand_id' => $request->brand_id,
        'color_2' => $request->color_2,
        'color_3' => $request->color_3,
        'color_4' => $request->color_4,
        'color_5' => $request->color_5,
        'amount' => $request->amount,
        'weight' => $request->weight,
        'price' => $this->fa_num_to_en($request->price),
        'off_price' => $request->off_price,
        'fast_sending' => $request->fast_sending,
        'money_back' => $request->money_back,
        'support' => $request->support,
        'secure_payment' => $request->secure_payment,
        'feature_1' => $request->feature_1,
        'feature_2' => $request->feature_2,
        'feature_3' => $request->feature_3,
        'feature_4' => $request->feature_4,
        'feature_5' => $request->feature_5,
        'feature_6' => $request->feature_6,
        'feature_7' => $request->feature_7,
        'feature_8' => $request->feature_8,
        'feature_9' => $request->feature_9,
        'feature_10' => $request->feature_10,
        'description' => $request->description,
        'image' => $image,
        'attachment' => $attachment,
        'description' => $request->description,
        'file_size' => $file_size,
      ]);

  //add tags to the product
    if($shop)
    {
        $tagNames = explode(',',$request->get('tags'));
        $tagIds = [];
        foreach($tagNames as $tagName)
        {
            $tag = Tag::firstOrCreate(['name'=>$tagName]);
            if($tag)
            {
              $tagIds[] = $tag->id;
            }
        }
        $shop->tags()->sync($tagIds);
    }

      alert()->success('محصول جدید شما باموفقیت اضافه شد.', 'ثبت شد');
      return redirect()->route('product-list.index');


    break;

    //save new product and open new model
    case 'saveAndContinue':
    $shop = \Auth::user()->shop()->first()->products()->create([
    'title' => $request->title,
    'type' => $request->type,
    'color_1' => $request->color_1,
    'productCat_id' => $request->productCat_id,
    'brand_id' => $request->brand_id,
    'color_2' => $request->color_2,
    'color_3' => $request->color_3,
    'color_4' => $request->color_4,
    'color_5' => $request->color_5,
    'amount' => $request->amount,
    'weight' => $request->weight,
    'price' => $this->fa_num_to_en($request->price),
    'off_price' => $request->off_price,
    'fast_sending' => $request->fast_sending,
    'money_back' => $request->money_back,
    'support' => $request->support,
    'secure_payment' => $request->secure_payment,
    'feature_1' => $request->feature_1,
    'feature_2' => $request->feature_2,
    'feature_3' => $request->feature_3,
    'feature_4' => $request->feature_4,
    'feature_5' => $request->feature_5,
    'feature_6' => $request->feature_6,
    'feature_7' => $request->feature_7,
    'feature_8' => $request->feature_8,
    'feature_9' => $request->feature_9,
    'feature_10' => $request->feature_10,
    'description' => $request->description,
    'image' => $image,
    'attachment' => $attachment,
    'description' => $request->description,
    'file_size' => $file_size,
  ]);

  //add tags to the product
if($shop)
{
    $tagNames = explode(',',$request->get('tags'));
    $tagIds = [];
    foreach($tagNames as $tagName)
    {
        $tag = Tag::firstOrCreate(['name'=>$tagName]);
        if($tag)
        {
          $tagIds[] = $tag->id;
        }
    }
    $shop->tags()->sync($tagIds);
}
if ($request->type == 'file') {
    session()->flash('flashModalFile');
}
elseif($request->type == 'service'){
    session()->flash('flashModalService');
}
else{
    session()->flash('flashModalProduct');
}
  alert()->success('محصول جدید شما باموفقیت اضافه شد.', 'ثبت شد');
  return redirect()->route('product-list.index');
  break;

}
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
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
    public function update(Request $request, $id)
    {
        $product = \Auth::user()->shop()->first()->products()->where('id',$id)->get()->first();
        if($request->type == 'file' and $request->file('attachment') == null){
            $attachment = $product->attachment;
            $file_size = $product->file_size;
        }
        elseif($request->type == 'file'){
            $attachment = $this->uploadFile($request->file('attachment'), false, false);
            $file_size = $request->file('attachment')->getSize();
        }
            else{
            $attachment = null;
            $file_size = null;
        }
           if($request->file('image') == null){
               $image = $product->image;
           }
           else{
               $image = $this->uploadFile($request->file('image'), false, true);
           }



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
      if($request->amount != null){
        $request->amount = $this->fa_num_to_en($request->amount);
      }
      if($request->weight != null){
        $request->weight = $this->fa_num_to_en($request->weight);
      }
      if($request->off_price != null){
        $request->off_price = $this->fa_num_to_en($request->off_price);
      }
      $shop = \Auth::user()->shop()->first()->products()->where('id',$id)->get()->first()->update([
        'title' => $request->title,
        'type' => $request->type,
        'color_1' => $request->color_1,
        'productCat_id' => $request->productCat_id,
        'brand_id' => $request->brand_id,
        'color_2' => $request->color_2,
        'color_3' => $request->color_3,
        'color_4' => $request->color_4,
        'color_5' => $request->color_5,
        'amount' => $request->amount,
        'weight' => $request->weight,
        'price' => $this->fa_num_to_en($request->price),
        'off_price' => $request->off_price,
        'fast_sending' => $request->fast_sending,
        'money_back' => $request->money_back,
        'support' => $request->support,
        'secure_payment' => $request->secure_payment,
        'feature_1' => $request->feature_1,
        'feature_2' => $request->feature_2,
        'feature_3' => $request->feature_3,
        'feature_4' => $request->feature_4,
        'feature_5' => $request->feature_5,
        'feature_6' => $request->feature_6,
        'feature_7' => $request->feature_7,
        'feature_8' => $request->feature_8,
        'feature_9' => $request->feature_9,
        'feature_10' => $request->feature_10,
        'description' => $request->description,
        'image' => $image,
        'attachment' => $attachment,
        'description' => $request->description,
        'file_size' => $file_size,
      ]);
      alert()->success('محصول جدید شما باموفقیت ویرایش شد.', 'ثبت شد');
      return redirect()->route('product-list.index');
    }

    public function changeStatus(Request $request){

        $product = Product::find($request->id);
        if($product->status == 0)
            $product->status = 1;
        else
            $product->status = 0;
        $product->save();
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
    {
    $product = Product::where('id' , $request->id)->get()->first();
             if ($product->shop()->get()->first()->user_id !== \Auth::user()->id) {
                 alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
                 return redirect()->back();
             }

             $ProductCategory = \Auth::user()->shop()->first()->products()->where('id' , $request->id)->first()->delete();
             alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
              return redirect()->back();
          }
    }
