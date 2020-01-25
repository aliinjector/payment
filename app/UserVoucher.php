<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class UserVoucher extends Model
{
  use SoftDeletes, CascadeSoftDeletes;
    protected $dates = ['deleted_at'];
    
  public function user()
{
     return $this->belongsTo('App\User');
 }
  public function voucher()
{
     return $this->belongsTo('App\Voucher');
 }
  public function userPurchase()
{
     return $this->belongsTo('App\UserPurchase');
 }
 public function shop()
 {
     return $this->belongsTo('App\Shop');
 }
}
