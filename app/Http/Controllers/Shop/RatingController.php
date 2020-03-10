<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Rating;


class RatingController extends Controller
{

      public function updateRate(Request $request) {
          $user = \auth::user();
          $product = Product::find($request->id);
          if (Rating::where([['author_id', $user->id], ['ratingable_id', $product->id]])->get()->count() == 0) {
              $rating = $product->rating(['rating' => $request->rate], $user);
              alert()->success('امتیاز شما با موفقیت ثبت شد', 'انجام شد');
              return redirect()->route('product', ['shop' => $request->shop, 'id' => $request->slug]);
          } else {
              alert()->error('شما قبلا برای این محصول نظر ثبت کرده اید', 'خطا');
              return redirect()->route('product', ['shop' => $request->shop, 'id' => $request->slug]);
          }
      }
}
