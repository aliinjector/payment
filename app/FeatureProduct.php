<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureProduct extends Model
{
  public function product()
  {
      return $this->belongsTo('App\Product');
  }

  public function feature()
  {
      return $this->belongsTo('App\Feature');
  }
}
