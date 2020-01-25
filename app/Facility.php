<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Facility extends Model
{


    use SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];
  protected $guarded = ['id'];

  public function product()
  {
       return $this->belongsTo('App\Product');
   }
}
