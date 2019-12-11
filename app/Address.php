<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
  use SoftDeletes, CascadeSoftDeletes;
  protected $cascadeDeletes = ['users'];
  protected $dates = ['deleted_at'];

  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
