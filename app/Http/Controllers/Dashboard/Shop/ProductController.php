<?php
namespace App\Http\Controllers\Dashboard\Shop;

use App\Tag;
use App\Shop;
use App\Product;
use App\Brand;
use App\ErrorLog;
use App\Color;
use App\Specification;
use App\Value;
use App\Facility;
use App\Dashboard;
use App\ProductCategory;
use App\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;



class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(request()->has('notification')){
        $user = \auth()->user();
        $user->notifications()->where('type', 'App\Notifications\MinAmountWarning')->update(['read_at' => now()]);
      }

        if(\Auth::user()->type == 'customer'){
            return redirect()->back();
        }else{
          if (\Auth::user()->shop()->first()->ProductCategories()->get()->count() == 0) {
              alert()->warning('هدایت به صفحه ساخت دسته بندی', 'لطفا ابتدا دسته بندی جدید ایجاد کنید');
              return redirect()->route('product-category.index');
          }
          else{
              $shop = \Auth::user()->shop()->first();
              $productCategories = \Auth::user()->shop()->first()->ProductCategories()->doesntHave('children')->get();
              $brands = \Auth::user()->shop()->first()->brands()->get();
              $colors = Color::all();
              $products = \Auth::user()->shop()->first()->products()->get();
              return view('dashboard.shop.product.index', compact('productCategories','products', 'brands', 'colors','shop'));
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
         if($request->off_price == null){
           $request->merge(['off_price_started_at' => null]);
           $request->merge(['off_price_expired_at' => null]);
         }
         else{
           $request->validate([
             'off_price_started_at' => 'required_with:off_price',
             'off_price_expired_at' => 'required_with:off_price|gt:off_price_started_at',
           ]);
           //check for started and and expired for off_price
           if($request->off_price_started_at != null){
             $realTimestampStart = substr($request->off_price_started_at,0,10);
             $request->off_price_started_at = date('Y-m-d H:i:s', (int)$realTimestampStart);
           }
           if($request->off_price_expired_at != null){
             $realTimestampExpire = substr($request->off_price_expired_at,0,10);
             $request->off_price_expired_at = date('Y-m-d H:i:s', (int)$realTimestampExpire);
           }
         }

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
      $attachment = Storage::putFileAs('attachment', $request->file('attachment'), \Auth::user()->id."_".time()."_".$request->file('attachment')->getClientOriginalName());
      else
      $attachment = null;
      //check if enable if off to change enable to 0
      if ($request->enable != "on")
      $request->enable = 0;
     else
     $request->enable = 1;

       //check options of products
       if (!isset($request->fast_sending))
       $request->fast_sending = 'off';

       if (!isset($request->money_back))
       $request->money_back = 'off';

       if (!isset($request->support))
       $request->support = 'off';

       if (!isset($request->secure_payment))
       $request->secure_payment = 'off';

       if (!isset($request->discount_status))
       $request->discount_status = 'disable';
       else
       $request->discount_status = 'enable';

      //check amount of product and change fa number to en
      if($request->amount != null){
        $request->amount = $this->fa_num_to_en($request->amount);
      }
      if($request->min_amount != null){
        $request->min_amount = $this->fa_num_to_en($request->min_amount);
      }
      if($request->measure != null){
        $request->measure = $this->fa_num_to_en($request->measure);
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
      $product = \Auth::user()->shop()->first()->products()->create([
        'title' => $request->title,
        'type' => $request->type,
        'productCat_id' => $request->productCat_id,
        'brand_id' => $request->brand_id,
        'amount' => $request->amount,
        'min_amount' => $request->min_amount,
        'measure' => $request->measure,
        'weight' => $request->weight,
        'price' => $this->fa_num_to_en($request->price),
        'off_price' => $request->off_price,
        'fast_sending' => $request->fast_sending,
        'money_back' => $request->money_back,
        'support' => $request->support,
        'secure_payment' => $request->secure_payment,
        'discount_status' => $request->discount_status,
        'description' => $request->description,
        'image' => $image,
        'attachment' => $attachment,
        'off_price_started_at' => $request->off_price_started_at,
        'off_price_expired_at' => $request->off_price_expired_at,
        'description' => $request->description,
        'file_size' => $file_size,
      ]);

  //add facilities
  if($request->facility[0] != null){
    foreach(array_slice($request->facility, 0, 50) as $facility){
      DB::table('facilities')->insert(['name' => $facility, 'product_id' => $product->id]);
    }
  }

  //add tags and colors and features and specifications to the product
    if($product)
    {
      DB::transaction(function () use ($request, $product) {

        $tagIds = [];
        $colorIds = [];
        $featureIds = [];
        $sepecificationIds = [];

        //get all tags of product
        $tagNames = explode(',',$request->get('tags'));
        foreach($tagNames as $tagName)
        {
            $tag = Tag::firstOrCreate(['name'=>$tagName, 'shop_id' =>Auth::user()->shop()->first()->id]);
            if($tag)
            {
              $tagIds[] = $tag->id;
            }
        }
        $product->tags()->sync($tagIds);

        // get all colors of product
        if($request->get('color')){
          foreach($request->get('color') as $colorName)
          {
              $color = Color::firstOrCreate(['id'=>$colorName]);
              if($color)
              {
                $colorIds[] = $color->id;
              }
          }
          $product->colors()->sync($colorIds);
        }

        if($request->get('specifications')){
          foreach($request->get('specifications') as $specificationName)
          {
              $specification = Specification::firstOrCreate(['id'=>$specificationName]);
              if($specification)
              {
                $sepecificationIds[] = $specification->id;
              }
          }
          $product->specifications()->sync($sepecificationIds);
        }


        //get all features of product
        if($request->get('value')){
            foreach($request->get('value') as $featureId=>$featureValue)
            {
              $feature = Feature::find($featureId);
              if($feature){
                $featureIds[$feature->id] = ['value'=>$featureValue];
              }
            }

            $product->features()->sync($featureIds);
        }


});
    }


      alert()->success('محصول جدید شما باموفقیت اضافه شد.', 'ثبت شد');
      return redirect()->route('product-list.index');


    break;

    //save new product and open new model
    case 'saveAndContinue':
    $product = \Auth::user()->shop()->first()->products()->create([
    'title' => $request->title,
    'type' => $request->type,
    'productCat_id' => $request->productCat_id,
    'brand_id' => $request->brand_id,
    'amount' => $request->amount,
    'min_amount' => $request->min_amount,
    'measure' => $request->measure,
    'weight' => $request->weight,
    'price' => $this->fa_num_to_en($request->price),
    'off_price' => $request->off_price,
    'fast_sending' => $request->fast_sending,
    'money_back' => $request->money_back,
    'support' => $request->support,
    'secure_payment' => $request->secure_payment,
    'discount_status' => $request->discount_status,
    'description' => $request->description,
    'image' => $image,
    'attachment' => $attachment,
    'off_price_started_at' => $request->off_price_started_at,
    'off_price_expired_at' => $request->off_price_expired_at,
    'description' => $request->description,
    'file_size' => $file_size,
  ]);

  //add facilities
  if($request->facility[0] != null){
    foreach(array_slice($request->facility, 0, 50) as $facility){
      DB::table('facilities')->insert(['name' => $facility, 'product_id' => $product->id]);
    }
  }
  //add tags to the product
  if($product)
  {
    DB::transaction(function () use ($request, $product) {

      $tagIds = [];
      $colorIds = [];
      $sepecificationIds = [];
      //get all tags of product
      $tagNames = explode(',',$request->get('tags'));
      foreach($tagNames as $tagName)
      {
          $tag = Tag::firstOrCreate(['name'=>$tagName, 'shop_id' =>Auth::user()->shop()->first()->id]);
          if($tag)
          {
            $tagIds[] = $tag->id;
          }
      }
      // get all color of product
      if($request->get('color')){
        foreach($request->get('color') as $colorName)
        {
            $color = Color::firstOrCreate(['id'=>$colorName]);
            if($color)
            {
              $colorIds[] = $color->id;
            }
        }
        $product->colors()->sync($colorIds);
      }

      if($request->get('specifications')){
        foreach($request->get('specifications') as $specificationName)
        {
            $specification = Specification::firstOrCreate(['id'=>$specificationName]);
            if($specification)
            {
              $sepecificationIds[] = $specification->id;
            }
        }
        $product->specifications()->sync($sepecificationIds);
      }


              //get all features of product
              if($request->get('value')){
                  foreach($request->get('value') as $featureId=>$featureValue)
                  {

                    $feature = Feature::find($featureId);
                    if($feature){
                      $featureIds[$feature->id] = ['value'=>$featureValue];
                    }
                  }

                  $product->features()->sync($featureIds);
              }


      $product->tags()->sync($tagIds);
    });

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
// });

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
    public function showPhysical(Product $product)
    {
        if(\Auth::user()->type == 'customer'){
            return redirect()->back();
        }else{
              $shop = \Auth::user()->shop()->first();
              return view('dashboard.shop.product.show-physical', compact('product','shop'));
            }
    }



    public function showFile(Product $product)
    {
        if(\Auth::user()->type == 'customer'){
            return redirect()->back();
        }else{
              $shop = \Auth::user()->shop()->first();
              return view('dashboard.shop.product.show-file', compact('product','shop'));
            }
    }



    public function showService(Product $product)
    {
        if(\Auth::user()->type == 'customer'){
            return redirect()->back();
        }else{
              $shop = \Auth::user()->shop()->first();
              return view('dashboard.shop.product.show-service', compact('product','shop'));
            }
    }




    public function editPhysical($id)
    {
      $shop = \Auth::user()->shop()->first();
      $product = Product::find($id);
      $tags = [];
      foreach($product->tags as $tag){
        $tags[] = $tag->name;
      }
      $tags = implode(',', $tags);
      $productCategories = \Auth::user()->shop()->first()->ProductCategories()->doesntHave('children')->get();
      $brands = \Auth::user()->shop()->first()->brands()->get();
      $colors = Color::all();
      return view('dashboard.shop.product.edit-physical', compact('product','productCategories','brands','colors','tags','shop'));
    }



    public function editFile($id)
    {
      $shop = \Auth::user()->shop()->first();
      $product = Product::find($id);
      $tags = [];
      foreach($product->tags as $tag){
        $tags[] = $tag->name;
      }
      $tags = implode(',', $tags);
      $productCategories = \Auth::user()->shop()->first()->ProductCategories()->doesntHave('children')->get();
      $brands = \Auth::user()->shop()->first()->brands()->get();
      $colors = Color::all();
      return view('dashboard.shop.product.edit-file', compact('product','productCategories','brands','colors','tags','shop'));
    }




    public function editService($id)
    {
      $shop = \Auth::user()->shop()->first();
      $product = Product::find($id);
      $tags = [];
      foreach($product->tags as $tag){
        $tags[] = $tag->name;
      }
      $tags = implode(',', $tags);
      $productCategories = \Auth::user()->shop()->first()->ProductCategories()->doesntHave('children')->get();
      $brands = \Auth::user()->shop()->first()->brands()->get();
      $colors = Color::all();
      return view('dashboard.shop.product.edit-service', compact('product','productCategories','brands','colors','tags','shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
     public function update(ProductUpdateRequest $request, $id)
      {
        //off price timing
        if($request->off_price == null){
          $request->merge(['off_price_started_at' => null]);
          $request->merge(['off_price_expired_at' => null]);
        }
        else{
          $request->validate([
            'off_price_started_at' => 'required_with:off_price',
            'off_price_expired_at' => 'required_with:off_price|gt:off_price_started_at',
          ]);
          //check for started and and expired for off_price
          if($request->off_price_started_at != null){
            $realTimestampStart = substr($request->off_price_started_at,0,10);
            $request->off_price_started_at = date('Y-m-d H:i:s', (int)$realTimestampStart);
          }
          if($request->off_price_expired_at != null){
            $realTimestampExpire = substr($request->off_price_expired_at,0,10);
            $request->off_price_expired_at = date('Y-m-d H:i:s', (int)$realTimestampExpire);
          }
        }


          $product = \Auth::user()->shop()->first()->products()->where('id',$id)->get()->first();
          if($request->type == 'file' and $request->file('attachment') == null){
              $attachment = $product->attachment;
              $file_size = $product->file_size;
          }
          elseif($request->type == 'file'){
                $request->validate(['attachment' => 'required|mimes:doc,docx,pdf,zip,mp4,avi,webm,3gp,rar|max:50000']);
                $file_size = $request->file('attachment')->getSize();
                $attachment = Storage::putFileAs('attachment', $request->file('attachment'), \Auth::user()->id."_".time()."_".$request->file('attachment')->getClientOriginalName());
          }
              else{
              $attachment = null;
              $file_size = null;
          }
             if($request->file('image') == null){
                 $image = $product->image;
             }
             else{
                $request->validate(['image' => 'mimes:jpeg,png,jpg,gif|max:2048']);
                 $image = $this->uploadFile($request->file('image'), false, true);
             }

             if($request->brand_id == "null"){
               $request->merge(['brand_id' => null]);
             }

        if ( $request->enable != "on")
        $request->enable = 0;
       else
       $request->enable = 1;


       //check options of products
       if (!isset($request->fast_sending))
       $request->fast_sending = 'off';

       if (!isset($request->money_back))
       $request->money_back = 'off';

       if (!isset($request->support))
       $request->support = 'off';

       if (!isset($request->secure_payment))
       $request->secure_payment = 'off';

       if (!isset($request->discount_status))
       $request->discount_status = 'disable';
       else
       $request->discount_status = 'enable';


        if($request->amount != null){
          $request->amount = $this->fa_num_to_en($request->amount);
        }
        if($request->min_amount != null){
          $request->min_amount = $this->fa_num_to_en($request->min_amount);
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
          'productCat_id' => $request->productCat_id,
          'brand_id' => $request->brand_id,
          'amount' => $request->amount,
          'min_amount' => $request->min_amount,
          'measure' => $request->measure,
          'weight' => $request->weight,
          'price' => $this->fa_num_to_en($request->price),
          'off_price' => $request->off_price,
          'fast_sending' => $request->fast_sending,
          'money_back' => $request->money_back,
          'support' => $request->support,
          'secure_payment' => $request->secure_payment,
          'discount_status' => $request->discount_status,
          'description' => $request->description,
          'image' => $image,
          'attachment' => $attachment,
          'off_price_started_at' => $request->off_price_started_at,
          'off_price_expired_at' => $request->off_price_expired_at,
          'description' => $request->description,
          'file_size' => $file_size,
        ]);

        //add facilities
          foreach(array_slice($request->facility, 0, 50, true) as $facility_id => $facility){
            if($facility != null){
              if($product->facilities->count() != 0){
                Facility::updateOrCreate(['id' => $facility_id],['name' => $facility, 'product_id' => $product->id]);
              }
              else{
                  Facility::create(['name' => $facility, 'product_id' => $product->id]);
              }
          }
          else{
            if(Facility::where('id', $facility_id)->get()->first() != null){
              Facility::where('id', $facility_id)->get()->first()->delete();
            }
          }
        }


        if($shop)
        {
            $tagIds = [];
            $colorIds = [];
            $featureIds = [];
            $sepecificationIds = [];
            //get all tags of product
            $tagNames = explode(',',$request->get('tags'));
            foreach($tagNames as $tagName)
            {
                $tag = Tag::firstOrCreate(['name'=>$tagName, 'shop_id' =>Auth::user()->shop()->first()->id]);
                if($tag)
                {
                  $tagIds[] = $tag->id;
                }
            }
            // get all color of product
            if($request->get('color')){
              foreach($request->get('color') as $colorName)
              {
                  $color = Color::firstOrCreate(['id'=>$colorName]);
                  if($color)
                  {
                    $colorIds[] = $color->id;
                  }
              }
              \Auth::user()->shop()->first()->products()->where('id',$id)->get()->first()->colors()->sync($colorIds);
            }

            if($request->get('specifications')){
              foreach($request->get('specifications') as $specificationName)
              {
                  $specification = Specification::firstOrCreate(['id'=>$specificationName]);
                  if($specification)
                  {
                    $sepecificationIds[] = $specification->id;
                  }
              }
              $product->specifications()->sync($sepecificationIds);
            }

                    //get all features of product
                    if($request->get('value')){
                        foreach($request->get('value') as $featureId=>$featureValue)
                        {

                          $feature = Feature::find($featureId);
                          if($feature){
                            $featureIds[$feature->id] = ['value'=>$featureValue];
                          }
                        }

                        $product->features()->sync($featureIds);
                    }


            \Auth::user()->shop()->first()->products()->where('id',$id)->get()->first()->tags()->sync($tagIds);
        }
        alert()->success('محصول شما باموفقیت ویرایش شد.', 'ثبت شد');
        return redirect()->route('product-list.index');
      }



    public function changeStatus(Request $request){
      $product = Product::find($request->id);
      if ($product->shop()->get()->first()->user_id !== \Auth::user()->id) {
          alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
          return redirect()->back();
      }
        $shop = Shop::where('english_name', $request->shop)->get()->first();
        foreach($shop->carts as $cart){
          foreach($cart->cartProduct as $cartProduct){
            $disabledProduct = $cartProduct->product()->where('status', 'disable')->get()->first();
            if($disabledProduct){
              $cartProduct->where('product_id', $disabledProduct->id)->delete();
            }
          }
        }
        if($product->status == "disable")
            $product->status = "enable";
        else
            $product->status = "disable";
        $product->save();
    }


    public function getFeatures(Request $request){
      $features = collect();
      if($this->getAllParentCategories($request->id)->count() == 0){
        $features[] = ProductCategory::find($request->id)->features;
      }
      else{
        foreach($this->getAllParentCategories($request->id) as $category){
          $features[] = ProductCategory::find($category->id)->features;
      }
      }
  return response()->json($features);
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


      public function destroyImage(Request $request){

        $product = Product::find($request->id);
        if ($product->shop()->get()->first()->user_id !== \Auth::user()->id) {
            alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
            return redirect()->back();
        }
        foreach($product->image as $image){
            $image = ltrim($image, '/');
            unlink($image);
                        }
          $product->update([
                'image' => null
            ]);
          }



      public function destroyFile(Request $request){
        $product = Product::find($request->id);
        if($product->type == 'file'){
          Storage::delete($product->attachment);
          $product->update([
                'attachment' => null
            ]);
          }
        }



        public static function getAllParentCategories($cat_id) {
            $allSubCategories = collect();
            if (ProductCategory::find($cat_id)->parent()->exists()) {
            foreach (ProductCategory::find($cat_id)->parent()->get() as $subCategory) {
                $allSubCategories[] = $subCategory;
                if ($subCategory->parent()->exists()) {
                    foreach ($subCategory->parent()->get() as $subSubCategory) {
                        $allSubCategories[] = $subSubCategory;
                    }
                    if ($subSubCategory->parent()->exists()) {
                        foreach ($subSubCategory->parent()->get() as $subSubSubCategory) {
                            $allSubCategories[] = $subSubSubCategory;
                            if ($subSubSubCategory->parent()->exists()) {
                                foreach ($subSubSubCategory->parent()->get() as $subSubSubSubCategory) {
                                    $allSubCategories[] = $subSubSubSubCategory;
                                }
                            }
                        }
                    }
                }
            }
          }
            return $allSubCategories;
        }




    }
