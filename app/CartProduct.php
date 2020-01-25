<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CartProduct extends Model
{
  use SoftDeletes;
  protected $guarded = ['id'];
  protected $dates = ['deleted_at'];
  protected $table = 'cart_product';

  public function porducts()
  {
      return $this->hasMany('App\Product');
  }
  public function product()
  {
      return $this->belongsTo('App\Product');
  }
  public function color()
  {
      return $this->belongsTo('App\Color');
  }
}
