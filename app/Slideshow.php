<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Slideshow extends Model
{
  use SoftDeletes;

protected $dates = ['deleted_at'];
protected $guarded = ['id'];
protected $casts = ['image' => 'array'];

  public function shop()
  {
   return $this->belongsTo('App\Shop');
  }

}
