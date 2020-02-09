<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecificationItem extends Model
{
  public function specification()
  {
      return $this->belongsTo('App\Specification');
  }
}
