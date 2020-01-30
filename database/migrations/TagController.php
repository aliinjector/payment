<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Shop;
use Artesaos\SEOTools\Facades\SEOTools;

class TagController extends Controller
{
  public function tagProduct($shop, $name, Request $request) {
      $shop = Shop::where('english_name', $shop)->first();
      $shopTags = $shop->tags;
      $shopCategories = $shop->ProductCategories()->get();
      $tagName = Tag::where('name', $name)->get()->first()->name;
      $brands = $shop->brands;
      if ($request->has('type') and $request->has('sortBy') and $request->has('minprice') and $request->has('maxprice')) {
        $minPrice = $request->minprice;
        $maxPrice = $request->maxprice;
        $filterBy = $request->type;
        $sortBy = $request->sortBy['field'];
        if($shop->template->folderName == 2){
          $sortBy_array = explode('|', $request->sortBy['field']);
          $sortBy = $sortBy_array[0];
          $orderBy = $sortBy_array[1];
        }
        else{
          $orderBy = $request->sortBy['orderBy'];
        }
          $perPage = 8;
          if ($request->type == 'all') {
              $products = Tag::where('name', $name)->get()->first()->products()->where('shop_id', $shop->id)->orderBy($sortBy, $orderBy)->paginate($perPage);
          } else {
              $products = Tag::where('name', $name)->get()->first()->products()->where('shop_id', $shop->id)->where('type', $request->type)->orderBy($sortBy, $orderBy)->paginate($perPage);
          }
      } else {
          $products = Tag::where('name', $name)->get()->first()->products()->where('shop_id', $shop->id)->paginate(8);
      }
      $template_folderName = $shop->template->folderName;

      SEOTools::setTitle($shop->name . ' | ' . $tagName);
      SEOTools::setDescription($shop->description);
      SEOTools::opengraph()->addProperty('type', 'website');

      return view("app.shop.$template_folderName.tags-product", compact('products', 'shop', 'shopCategories', 'tagName', 'brands', 'shopTags'));
  }
}
