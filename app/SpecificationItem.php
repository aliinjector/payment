<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SpecificationItem extends Model
{
  use SoftDeletes, CascadeSoftDeletes;
  protected $dates = ['deleted_at'];


  public function specification()
  {
      return $this->belongsTo('App\Specification');
  }

  public function productSpecificationItems()
{
  return $this->hasMany('App\ProductSpecificationitem');
}

}
