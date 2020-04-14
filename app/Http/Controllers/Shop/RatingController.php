<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Rating;


class RatingController extends Controller
{

      public function updateRate(Request $request) {
        $request->validate([
          'id' => 'required|numeric|min:1|max:10000000000000|regex:/^[0-9]+$/u',
          'rate' => 'required|min:0|max:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي. ]+$/u',
          'shop' => 'required|min:1|max:10000000000|regex:/^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+){0,2}$/',
          'slug' => 'required|min:1|max:10000000000000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.-_ ]+$/u',
    ]);
          $user = \auth::user();
          $product = Product::find($request->id);
          if (Rating::where([['author_id', $user->id], ['ratingable_id', $product->id]])->get()->count() == 0) {
              $rating = $product->rating(['rating' => $request->rate], $user);
              alert()->success('امتیاز شما با موفقیت ثبت شد', 'انجام شد');
              return redirect()->route('product', ['shop' => $request->shop, 'slug'=>$request->slug, 'id' => $request->id]);
          } else {
              alert()->error('شما قبلا برای این محصول نظر ثبت کرده اید', 'خطا');
              return redirect()->route('product', ['shop' => $request->shop, 'slug'=>$request->slug, 'id' => $request->id]);
          }
      }
}
