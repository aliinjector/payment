<?php

namespace App\Providers;

use App\Shop;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     public function boot()
   {
     $shop = Shop::where('english_name', preg_split("#/#", $this->app->request->getRequestUri())[1])->get()->first();
    if($shop != null){
      if($shop->status == 0){
        abort(404);
      }
    }
       $this->app->setLocale(\Cookie::get('lang'));
       view()->composer('app.shop.2.layouts.master', function($view) {
           if (\Auth::check()){
          if(\Auth::user()->cart()->get()->first() != null){
            $products = \Auth::user()->cart()->get()->first()->products();
            $cart = \Auth::user()->cart()->get()->first();
            $view->with(['products' => $products, 'cart' => $cart]);

          }
          else{
            $products = [];
            $view->with(['products' => $products]);
          }
           }
       });
   }
}
