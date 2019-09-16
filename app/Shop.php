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
        return $this->embedsOne('App\ShopContact');
    }

   public function ProductCategories()
    {
        return $this->embedsMany('App\ProductCategory');
    }
    public function products()
     {
         return $this->embedsMany('App\Product');
     }

}
