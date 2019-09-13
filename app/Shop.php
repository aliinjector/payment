<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Shop extends Eloquent
{
    public function shopContact()
    {
        return $this->hasOne('App\ShopContact');
    }
    public function products()
   {
       return $this->hasMany('App\Product');
   }
   public function categories()
    {
        return $this->hasMany('App\ProductCategory');
    }
}
