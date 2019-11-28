<?php
namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;
use App\ProductCategory;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Pagination\LengthAwarePaginator;
class CategoryController extends Controller
{
  public function index($shop, $categroyId, Request $request) {

      $shop = Shop::where('english_name', $shop)->first();
      $shopCategories = $shop->ProductCategories()->get();
      $categories = Shop::where('english_name', $shop->english_name)->first()->ProductCategories()->get()->where('parent_id', null);
      $category = ProductCategory::where('id', $categroyId)->get()->first();
      $subCategories = $this->getAllSubCategories($categroyId)->where('parent_id',$categroyId);
      if ($request->has('type') and $request->has('sortBy') and $request->has('minprice') and $request->has('maxprice')) {
          $orderBy = $request->sortBy['orderBy'];
          $minPrice = $request->minprice;
          $maxPrice = $request->maxprice;
          $filterBy = $request->type;
          $sortBy = $request->sortBy['field'];
          $perPage = 8;
          if ($request->type == 'all') {
              if ($orderBy == 'desc') {
                  $products = $this->getAllCategoriesProducts((int)$categroyId)->whereBetween('price', [$minPrice, $maxPrice])->sortByDesc($sortBy);
              } else {
                  $products = $this->getAllCategoriesProducts((int)$categroyId)->whereBetween('price', [$minPrice, $maxPrice])->sortBy($sortBy);
              }
          } else {
              if ($orderBy == 'desc') {
                  $products = $this->getAllCategoriesProducts((int)$categroyId)->where('type', $filterBy)->whereBetween('price', [$minPrice, $maxPrice])->sortByDesc($sortBy);
              } else {
                  $products = $this->getAllCategoriesProducts((int)$categroyId)->where('type', $filterBy)->whereBetween('price', [$minPrice, $maxPrice])->sortBy($sortBy);
              }
          }
      } else {
          $products = $this->getAllCategoriesProducts((int)$categroyId);
      }
      $total = $products->count();
      $perPage = 16; // How many items do you want to display.
      $currentPage = request()->page; // The index page.
      $productsPaginate = new LengthAwarePaginator($products->forPage($currentPage, $perPage), $total, $perPage, $currentPage);
      SEOTools::setTitle($shop->name . ' | ' . ProductCategory::where('id', $categroyId)->get()->first()->name);
      $template_folderName = $shop->template->folderName;
      SEOTools::setDescription($shop->description);
      SEOTools::opengraph()->addProperty('type', 'website');

      return view("app.shop.$template_folderName.category", compact('products', 'shopCategories', 'shop', 'category', 'categories', 'productsPaginate', 'subCategories'));
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
          return $allSubCategories;
      }

}
