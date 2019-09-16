<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use ProductCategory;

class Shop extends Eloquent
{
    protected $guarded = ['id'];

    public function shopContact()
    {
        return $this->hasOne('App\ShopContact');
    }

   public function ProductCategories()
    {
      return $this->hasMany('App\ProductCategory');
    }
    public function products()
   {
       return $this->hasMany('App\Product');
   }

}
