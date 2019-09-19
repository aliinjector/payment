<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Card extends Model
{
    protected $guarded = ['id'];

      public function checkouts()
      {
          return $this->hasMany('App\Checkout');
      }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }



}
