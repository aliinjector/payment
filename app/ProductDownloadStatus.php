<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDownloadStatus extends Model
{
  use SoftDeletes, CascadeSoftDeletes;

  protected $guarded = ['id'];
  protected $dates = ['deleted_at'];



  public function product()
  {
      return $this->belongsTo('App\Product');
  }
  public function purchase()
  {
      return $this->belongsTo('App\UserPurchase','user_purchase_id');
  }
  public function shop()
  {
      return $this->belongsTo('App\Shop');
  }

}
