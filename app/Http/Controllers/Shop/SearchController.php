<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;
use App\Product;
use App\Color;
use App\Http\Requests\FilteringRequest;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function index(Request $request, $shop){
      $request->validate([
        'queryy' => 'required|min:1|max:100|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.-_ ]+$/u',
  ]);

        $shop = Shop::where('english_name', $shop)->first();
        $products = Product::search($request->queryy)->where('shop_id', $shop->id)->get();

      $shopCategories = $shop->ProductCategories()->get();
      $categories = Shop::where('english_name', $shop->english_name)->first()->ProductCategories()->get()->where('parent_id', null);

      $total = $products->count();
      $perPage = 16; // How many items do you want to display.
      $currentPage = request()->page; // The index page.
      $productsPaginate = new LengthAwarePaginator($products->forPage($currentPage, $perPage), $total, $perPage, $currentPage);
      $template_folderName = $shop->template->folderName;

      SEOTools::setTitle($shop->name . ' | ' . $shop->name);
      SEOTools::setDescription($shop->description);
      SEOTools::opengraph()->addProperty('type', 'website');

      return view("app.shop.$template_folderName.layouts.partials.products", compact('products', 'shop','productsPaginate','shopCategories'));
    }



}
