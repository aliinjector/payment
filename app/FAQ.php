<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
  use SoftDeletes, CascadeSoftDeletes;

  protected $dates = ['deleted_at'];
  protected $guarded = ['id'];

  public function shop()
  {
      return $this->belongsTo('App\Shop');
  }
}
