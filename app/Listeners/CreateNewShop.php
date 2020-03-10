<?php

namespace App\Listeners;

use App\Events\NewShop;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Shop;
use App\Invoice;
use App\ShopContact;
use App\Application;



class CreateNewShop
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewShop  $event
     * @return void
     */
    public function handle(NewShop $event)
    {
      if(\Auth::user()->shop()->count() == 0){
          $shop = new Shop;
          $shop->name = "نام تست";
          $shop->english_name = \Auth::user()->id;
          $shop->user_id = \Auth::user()->id;
          $shop->category_id = 1;
          $shop->status = 1;
          $shop->quick_way = "disable";
          $shop->posting_way = "enable";
          $shop->person_way = "disable";
          $shop->cash_payment = "enable";
          $shop->online_payment = "enable";
          $shop->template_id = 1;
          $shop->description = "توضیحات تست";
          $shop->save();

          // new shop Invoice
          $shopContact = new Invoice;
          $shopContact->shop_id = \Auth::user()->shop()->first()->id;
          $shopContact->save();

          // new shop contact
          $shopContact = new ShopContact;
          $shopContact->shop_id = \Auth::user()->shop()->first()->id;
          $shopContact->phone =  \Auth::user()->mobile;
          $shopContact->city = "تهران";
          $shopContact->province = "تهران";
          $shopContact->save();


          // new shop application
          $shopApplication = new Application;
          $shopApplication->shop_id = \Auth::user()->shop()->first()->id;
          $shopApplication->title =  'اپلیکیشن' .' ' . \Auth::user()->shop()->first()->name;
          $shopApplication->save();
      }
    }
}
