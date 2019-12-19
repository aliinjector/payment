<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Feature extends Model
{
  use SoftDeletes;

  protected $guarded = ['id'];
  protected $dates = ['deleted_at'];
  protected $casts = ['icon' => 'array'];


    public function productCategory()
    {
        return $this->belongsTo('App\ProductCategory','productCat_id');
    }



}
