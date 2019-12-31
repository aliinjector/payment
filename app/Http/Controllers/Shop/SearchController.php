<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Shop;
use App\ProductCategory;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function index(Request $request, $shop){

      $products = Product::where('english_name', $shop)->search($request->queryy)->get();


      $shop = Shop::where('english_name', $shop)->first();
      $shopCategories = $shop->ProductCategories()->get();
      $categories = Shop::where('english_name', $shop->english_name)->first()->ProductCategories()->get()->where('parent_id', null);

      $total = $products->count();
      $perPage = 16; // How many items do you want to display.
      $currentPage = request()->page; // The index page.
      $productsPaginate = new LengthAwarePaginator($products->forPage($currentPage, $perPage), $total, $perPage, $currentPage);
      SEOTools::setTitle($shop->name);
      $template_folderName = $shop->template->folderName;
      SEOTools::setDescription($shop->description);
      SEOTools::opengraph()->addProperty('type', 'website');

      return view("app.shop.$template_folderName.search", compact('products', 'shopCategories', 'shop', 'categories', 'productsPaginate'));


    }
}
