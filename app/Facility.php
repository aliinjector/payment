<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
  protected $guarded = ['id'];

  public function product()
  {
       return $this->belongsTo('App\Product');
   }
}
