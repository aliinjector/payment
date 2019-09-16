<?php

  namespace App;

  use Illuminate\Database\Eloquent\Model;
  use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

  class Product extends Eloquent
{
  protected $guarded = ['id'];

  public function productCategory()
   {
       return $this->embedsMany('App\productCategory');
   }
}
