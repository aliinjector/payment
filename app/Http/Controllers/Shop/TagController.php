<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Shop;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Color;
use Illuminate\Pagination\LengthAwarePaginator;


class TagController extends Controller
{
  public function tagProducts($shop, $name, Request $request) {

      $colors = Color::all();
      $shop = Shop::where('english_name', $shop)->first();
      $shopTags = $shop->tags;
      $shopCategories = $shop->ProductCategories()->get();
      $categories = Shop::where('english_name', $shop->english_name)->first()->ProductCategories()->get()->where('parent_id', null);
      $tag = Tag::where('name', $name)->get()->first();
      $brands = $shop->brands;
      //color product and category product merging
      if($request->color == null){
        $colorAndTagProducts = $tag->products->sortByDesc('created_at');
      }
      else{
        $colorProducts = Color::where('code', $request->color)->get()->first()->products;
        $tagProducts = $tag->products;
        $colorAndTagProducts = collect();
        foreach($colorProducts->toBase()->merge($tagProducts)->groupBy('id') as $allProducts){
        if($allProducts->count() > 1){
          $colorAndTagProducts[] = $allProducts;
              }
        }
      $colorAndTagProducts = $colorAndTagProducts->first();
      }
      if ($request->has('type') and $request->has('sortBy') and $request->has('minprice') and $request->has('maxprice') and $request->has('color')) {
        if($colorAndTagProducts != null){
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

                  $products = $colorAndTagProducts->whereBetween('price', [$minPrice, $maxPrice])->sortByDesc($sortBy)->unique('id');
              } else {

                  $products = $colorAndTagProducts->whereBetween('price', [$minPrice, $maxPrice])->sortBy($sortBy)->unique('id');
              }
          } else {
              if ($orderBy == 'desc') {
                  $products = $colorAndTagProducts->where('type', $filterBy)->whereBetween('price', [$minPrice, $maxPrice])->sortByDesc($sortBy)->unique('id');
              } else {
                  $products = $colorAndTagProducts->where('type', $filterBy)->whereBetween('price', [$minPrice, $maxPrice])->sortBy($sortBy)->unique('id');
              }
          }
      }
      else{
        $products = collect();
      }
    }
    else {
          $products = $colorAndTagProducts;
      }
      $total = $products->count();
      $perPage = 16; // How many items do you want to display.
      $currentPage = request()->page; // The index page.
      $productsPaginate = new LengthAwarePaginator($products->forPage($currentPage, $perPage), $total, $perPage, $currentPage);
      $template_folderName = $shop->template->folderName;

      SEOTools::setTitle($shop->name . ' | ' . $tag->name);
      SEOTools::setDescription($shop->description);
      SEOTools::opengraph()->addProperty('type', 'website');

      return view("app.shop.$template_folderName.layouts.partials.products", compact('products', 'shopCategories', 'shop', 'categories', 'tag', 'productsPaginate', 'brands', 'shopTags','colors'));
    }
}
