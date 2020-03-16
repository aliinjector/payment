<?php

namespace App\Http\Controllers\Shop;

use App\Shop;
use App\Compare;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CompareRequest;

use Artesaos\SEOTools\Facades\SEOTools;


class CompareController extends Controller
{

      public function index($shopName)
      {

          if (Shop::where('english_name', $shopName)->first() == null) {
              return abort(404);
          }
          $compareProducts = \Auth::user()->compare()->get()->first()->products;
          $shopCategories = Shop::where('english_name', $shopName)->first()->ProductCategories()->get();
          $shop = Shop::where('english_name', $shopName)->first();
          $template_folderName = $shop->template->folderName;

          SEOTools::setTitle($shop->name . ' | ' . 'مقایسه محصولات');
          SEOTools::setDescription($shop->description);
          SEOTools::opengraph()->addProperty('type', 'website');

          return view("app.shop.$template_folderName.compare", compact('shop', 'shopCategories','compareProducts'));


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
     public function store(CompareRequest $request, $shopName)
    {
      $product = Product::find($request->productID);
      $shop =  Shop::where('english_name', $shopName)->first();

      $compare = Compare::firstOrCreate(['user_id'=>\Auth::user()->id, 'shop_id' =>$shop->id]);
      if ($compare and $compare->products->count() != 0) {
        foreach ($compare->products as $compareProduct) {
          if ($compareProduct->productCategory == $product->productCategory) {
            $product->compare()->sync($compare->id);
            toastr()->success('افزوده شد.', '');
            return redirect()->back();
          }
          else{

            toastr()->error('برای مقایسه , محصولات باید در دسته بندی یکسان باشند.', '');
            return redirect()->back();
          }
        }
      }
      else{
        $product->compare()->sync($compare->id);
        toastr()->success('افزوده شد.', '');
        return redirect()->back();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\compare  $compare
     * @return \Illuminate\Http\Response
     */
    public function show(compare $compare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\compare  $compare
     * @return \Illuminate\Http\Response
     */
    public function edit(compare $compare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\compare  $compare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, compare $compare)
    {
        //
    }



    public function deleteFromCompare(Request $request){
      $shop = Shop::where('english_name', $request->shop)->get()->first();
      Compare::find($request->compare)->products()->detach($request->id);
      toastr()->success('حذف شد.', '');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\compare  $compare
     * @return \Illuminate\Http\Response
     */
    public function destroy(compare $compare)
    {
        //
    }
}
