<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;



class UserPurchase extends Model
{
  use SoftDeletes, CascadeSoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];
    public function product()
  {
       return $this->belongsTo('App\Product');
   }
    public function shop()
  {
       return $this->belongsTo('App\Shop');
   }
    public function cart()
  {
       return $this->belongsTo('App\Cart');
   }
    public function user()
  {
       return $this->belongsTo('App\User');
   }
    public function address()
  {
       return $this->belongsTo('App\Address');
   }
}
