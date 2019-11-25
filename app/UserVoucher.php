<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVoucher extends Model
{
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
