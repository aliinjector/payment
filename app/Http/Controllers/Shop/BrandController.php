<?php

namespace App\Http\Controllers\Shop;

use App\Brand;
use App\Shop;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilteringRequest;

use App\Color;
use Illuminate\Pagination\LengthAwarePaginator;


class BrandController extends Controller
{
  public function brandProduct($shop, $id, FilteringRequest $request) {
      $colors = collect();
      $shop = Shop::where('english_name', $shop)->first();
      $shopTags = $shop->tags;
      $shopCategories = $shop->ProductCategories()->get();
      $categories = Shop::where('english_name', $shop->english_name)->first()->ProductCategories()->get()->where('parent_id', null);
      $brand = Brand::where('id', $id)->get()->first();
      $brands = $shop->brands;
      $shopProducts = $shop->products;
      $minPriceProduct = $shopProducts->min('price');
      $maxPriceProduct = $shopProducts->max('price');
      //color product and category product merging
      if($request->color == null){
        $colorAndBrandProducts = $brand->products->sortByDesc('created_at');
      }
      else{
        $colorProducts = Color::where('code', $request->color)->get()->first()->products;
        $brandProducts = $brand->products;
        $colorAndBrandProducts = $colorProducts->intersect($brandProducts);
      }
      if ($request->has('type') and $request->has('sortBy') and $request->has('minprice') and $request->has('maxprice') and $request->has('color')) {
        if($colorAndBrandProducts != null){
          $minPrice = $request->minprice;
          $maxPrice = $request->maxprice;
          $filterBy = $request->type;
          $sortBy = $request->sortBy['field'];
          $perPage = 16;
          if($shop->template->folderName == 2){
            $sortBy_array = explode('|', $request->sortBy['field']);
            $sortBy = $sortBy_array[0];
            $orderBy = $sortBy_array[1];
          }
          else{
            $orderBy = $request->sortBy['orderBy'];
          }
          if ($request->type == 'all') {
              if ($orderBy == 'desc') {

                  $products = $colorAndBrandProducts->whereBetween('price', [$minPrice, $maxPrice])->sortByDesc($sortBy)->unique('id');
              } else {

                  $products = $colorAndBrandProducts->whereBetween('price', [$minPrice, $maxPrice])->sortBy($sortBy)->unique('id');
              }
          } else {
              if ($orderBy == 'desc') {
                  $products = $colorAndBrandProducts->where('type', $filterBy)->whereBetween('price', [$minPrice, $maxPrice])->sortByDesc($sortBy)->unique('id');
              } else {
                  $products = $colorAndBrandProducts->where('type', $filterBy)->whereBetween('price', [$minPrice, $maxPrice])->sortBy($sortBy)->unique('id');
              }
          }
      }
      else{
        $products = collect();
      }
    }
    else {
          $products = $colorAndBrandProducts;
      }
      $total = $products->count();
      foreach($products->where('status', 'enable') as $singleProduct){
        foreach($singleProduct->colors as $color){
          $colors[] = $color;
        }
      }
      $colors = $colors->unique('id');
      $perPage = 16; // How many items do you want to display.
      $currentPage = request()->page; // The index page.
      $productsPaginate = new LengthAwarePaginator($products->forPage($currentPage, $perPage), $total, $perPage, $currentPage);
      $template_folderName = $shop->template->folderName;
      SEOTools::setTitle($shop->name . ' | ' . $brand->name);
      SEOTools::setDescription($shop->description);
      SEOTools::opengraph()->addProperty('type', 'website');

      return view("app.shop.$template_folderName.layouts.partials.products", compact('products','minPriceProduct', 'maxPriceProduct', 'shopCategories', 'brand', 'shop', 'categories', 'productsPaginate', 'brands', 'shopTags','colors'));
      }

}
