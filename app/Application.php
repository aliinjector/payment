<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
  protected $guarded = ['id','shop_id'];

  public function shop()
  {
      return $this->belongsTo('App\Shop');
  }
}
