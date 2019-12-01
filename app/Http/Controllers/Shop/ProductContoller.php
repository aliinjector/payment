<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Shop;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Http\Controllers\Controller;

class ProductContoller extends \App\Http\Controllers\Controller
{
  public function show($shop, $id) {
      if (Shop::where('english_name', $shop)->first() == null || Shop::where('english_name', $shop)->first()->products()->where('id', $id)->first() == null) {
          return abort(404);
      }
      $shop = Shop::where('english_name', $shop)->first();
      $shopCategories = $shop->ProductCategories()->get();
      $product = $shop->products()->where('id', $id)->first();
      $product->increment('viewCount');
      $productRates = $product->rates()->get();
      $userProducts = [];
      if (\auth::user()) {
          foreach (\auth::user()->cart()->withTrashed()->where('status', 1)->get() as $cart) {
              foreach ($cart->products() as $single_product) {
                  $userProducts[] = $single_product;
              }
          }
      }
      $comments = $product->comments;
      $galleries = $product->galleries;
      $offeredProducts = $shop->products()->where('productCat_id', $product->productCat_id)->orderBy('created_at', 'DESC')->take(4)->get();
      $template_folderName = $shop->template->folderName;

      SEOTools::setTitle($shop->name . ' | ' . $product->title);
      SEOTools::setDescription($shop->name);
      SEOTools::opengraph()->addProperty('type', 'website');

      return view("app.shop.$template_folderName.product", compact('product', 'shop', 'shopCategories', 'productRates', 'userProducts', 'comments', 'galleries', 'offeredProducts'));
  }

}
