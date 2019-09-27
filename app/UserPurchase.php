<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserPurchase extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function product()
  {
       return $this->belongsTo('App\Product');
   }
    public function shop()
  {
       return $this->belongsTo('App\Shop');
   }
}
