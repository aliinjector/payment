<?php
namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;
use App\Color;
use App\Product;
use App\ProductCategory;
use App\Http\Requests\FilteringRequest;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Pagination\LengthAwarePaginator;
class CategoryController extends Controller
{

  public function index($shop, $categroyId, FilteringRequest $request) {
      $colors = collect();
      $shop = Shop::where('english_name', $shop)->first();
      $shopTags = $shop->tags;
      $shopCategories = $shop->ProductCategories()->get();
      $categories = Shop::where('english_name', $shop->english_name)->first()->ProductCategories()->get()->where('parent_id', null);
      $category = ProductCategory::where('id', $categroyId)->get()->first();
      $subCategories = $this->getAllSubCategories($categroyId)->where('parent_id',$categroyId);
      $brands = $shop->brands;
      $shopProducts = $shop->products->where('status', 'enable');
      $minPriceProduct = $shopProducts->min('price');
      $maxPriceProduct = $shopProducts->max('price');
      //color product and category product merging
      if($request->color == null){
        $colorAndCategoryProducts = $this->getAllCategoriesProducts((int)$categroyId)->sortByDesc('created_at');
      }
      else{
        $colorProducts = Color::where('code', $request->color)->get()->first()->products;
        $categoryProducts = $this->getAllCategoriesProducts((int)$categroyId);
        $colorAndCategoryProducts = $colorProducts->intersect($categoryProducts);
      }
      if ($request->has('type') and $request->has('sortBy') and $request->has('minprice') and $request->has('maxprice') and $request->has('color')) {
        if($colorAndCategoryProducts != null){
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

                  $products = $colorAndCategoryProducts->whereBetween('price', [$minPrice, $maxPrice])->sortByDesc($sortBy)->unique('id');
              } else {

                  $products = $colorAndCategoryProducts->whereBetween('price', [$minPrice, $maxPrice])->sortBy($sortBy)->unique('id');
              }
          } else {
              if ($orderBy == 'desc') {
                  $products = $colorAndCategoryProducts->where('type', $filterBy)->whereBetween('price', [$minPrice, $maxPrice])->sortByDesc($sortBy)->unique('id');
              } else {
                  $products = $colorAndCategoryProducts->where('type', $filterBy)->whereBetween('price', [$minPrice, $maxPrice])->sortBy($sortBy)->unique('id');
              }
          }
      }
      else{
        $products = collect();
      }
    }
    else {
          $products = $colorAndCategoryProducts;
      }
      $total = $products->count();
      if(!$request->has('type')){
        $perPage = 16; // How many items do you want to display.
      }
      else{
        $perPage = 10000; // How many items do you want to display.
      }
      foreach($products as $singleProduct){
        foreach($singleProduct->colors as $color){
          $colors[] = $color;
        }
      }
      $colors = $colors->unique('id');
      $currentPage = request()->page; // The index page.
      $productsPaginate = new LengthAwarePaginator($products->forPage($currentPage, $perPage), $total, $perPage, $currentPage);
      SEOTools::setTitle($shop->name . ' | ' . ProductCategory::where('id', $categroyId)->get()->first()->name);
      $template_folderName = $shop->template->folderName;
      SEOTools::setDescription($shop->description);
      SEOTools::opengraph()->addProperty('type', 'website');

      return view("app.shop.$template_folderName.layouts.partials.products", compact('products', 'minPriceProduct', 'maxPriceProduct', 'shopCategories', 'shop', 'category', 'categories', 'productsPaginate', 'subCategories', 'brands', 'shopTags','colors'));
  }




      public function getAllCategoriesProducts($cat_id) {
          $allProducts = collect();
          foreach (ProductCategory::find($cat_id)->products()->get() as $product) {
              $allProducts[] = $product;
          }
          foreach (ProductCategory::find($cat_id)->children()->get() as $subCategory) {
              foreach ($subCategory->products()->get() as $product) {
                  $allProducts[] = $product;
              }
              if ($subCategory->children()->exists()) {
                  foreach ($subCategory->children()->get() as $subSubCategory) {
                      foreach ($subSubCategory->products()->get() as $product) {
                          $allProducts[] = $product;
                      }
                  }
                  if ($subSubCategory->children()->exists()) {
                      foreach ($subSubCategory->children()->get() as $subSubSubCategory) {
                          foreach ($subSubSubCategory->products()->get() as $product) {
                              $allProducts[] = $product;
                          }
                          if ($subSubSubCategory->children()->exists()) {
                              foreach ($subSubSubCategory->children()->get() as $subSubSubSubCategory) {
                                  foreach ($subSubSubSubCategory->products()->get() as $product) {
                                      $allProducts[] = $product;
                                  }
                              }
                          }
                      }
                  }
              }
          }
          return $allProducts;
      }



      public static function getAllSubCategories($cat_id) {
          $allSubCategories = collect();
          if (ProductCategory::find($cat_id)->children()->exists()) {
          foreach (ProductCategory::find($cat_id)->children()->get() as $subCategory) {
              $allSubCategories[] = $subCategory;
              if ($subCategory->children()->exists()) {
                  foreach ($subCategory->children()->get() as $subSubCategory) {
                      $allSubCategories[] = $subSubCategory;
                  }
                  if ($subSubCategory->children()->exists()) {
                      foreach ($subSubCategory->children()->get() as $subSubSubCategory) {
                          $allSubCategories[] = $subSubSubCategory;
                          if ($subSubSubCategory->children()->exists()) {
                              foreach ($subSubSubCategory->children()->get() as $subSubSubSubCategory) {
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
