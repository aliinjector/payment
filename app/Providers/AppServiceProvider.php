<?php

namespace App\Providers;

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
       view()->composer('app.shop.2.layouts.master', function($view) {
           if (\Auth::check()){
          if(\Auth::user()->cart()->get()->first() != null){
            $products = \Auth::user()->cart()->get()->first()->products();

          }
          else{
            $products = [];
          }
               $view->with('products', $products);
           }
       });
   }
}
