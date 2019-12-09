<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  public function shop()
  {
      return $this->belongsTo('App\Shop');
  }
}
