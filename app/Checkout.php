<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Checkout extends Model
{
    protected $guarded = ['id'];


      public function card()
      {
          return $this->belongsTo('App\Card');
      }

      public function wallet()
      {
          return $this->belongsTo('App\Wallet');
      }




  }
