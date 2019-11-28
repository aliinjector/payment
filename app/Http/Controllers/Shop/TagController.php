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
      $shopCategories = $shop->ProductCategories()->get();
      $tagName = Tag::where('name', $name)->get()->first()->name;
      if ($request->has('type') and $request->has('sortBy')) {
          $orderBy = $request->sortBy['orderBy'];
          $filterBy = $request->type;
          $sortBy = $request->sortBy['field'];
          $perPage = 16;
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

      return view("app.shop.$template_folderName.tags-product", compact('products', 'shop', 'shopCategories', 'tagName'));
  }
}
