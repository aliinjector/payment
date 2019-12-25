<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
  protected $guarded = ['id'];


  public function features()
  {
      return $this->belongsTo('App\Feature');
  }

}
