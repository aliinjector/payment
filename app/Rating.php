<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Rating extends Model
{
      use SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];
}
