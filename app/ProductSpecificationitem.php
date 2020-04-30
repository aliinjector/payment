<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSpecificationitem extends Model
{
  // use SoftDeletes;

  protected $guarded = ['id'];
  // protected $dates = ['deleted_at'];
  protected $table = 'product_specificationItem';



  public function product()
  {
      return $this->belongsTo('App\Product');
  }
  public function specificationItem()
  {
      return $this->belongsTo('App\SpecificationItem');
  }


}
