<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
  protected $guarded = ['id'];

  public function products()
  {
      return $this->belongsToMany('App\Product');
  }
  public function shop()
  {
      return $this->belongsTo('App\Wishlist');
  }
  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
