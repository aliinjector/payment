<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
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
