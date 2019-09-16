<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ShopContact extends Eloquent
{
      protected $guarded = ['id'];
      
      public function shop()
     {
         return $this->belongsTo('App\Shop');
     }
}
