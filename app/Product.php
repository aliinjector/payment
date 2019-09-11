<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  public function category()
   {
       return $this->belongsTo('App\ProductCategory','productCat_id');
   }

   public function shop()
    {
        return $this->belongsTo('App\Shop');
    }


}
