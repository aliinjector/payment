<?php

  namespace App;

  use Illuminate\Database\Eloquent\Model;
  use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

  class ProductCategory extends Eloquent
{
  protected $guarded = ['id'];
  public function products()
   {
       return $this->hasMany('App\Product');
   }
   public function shop()
  {
      return $this->belongsTo('App\Shop');
  }

}
