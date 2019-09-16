<?php

  namespace App;

  use Illuminate\Database\Eloquent\Model;
  use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

  class Product extends Eloquent
{
  protected $guarded = ['id'];

  public function productCategory()
  {
       return $this->belongsTo('App\ProductCategory','productCat_id');
   }
   public function shop()
 {
     return $this->belongsTo('App\Shop');
 }
}
