<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;



class Feature extends Model
{
  use SoftDeletes, CascadeSoftDeletes;

  protected $guarded = ['id'];
  protected $dates = ['deleted_at'];
  protected $casts = ['icon' => 'array'];


    public function productCategory()
    {
        return $this->belongsTo('App\ProductCategory','productCat_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function values()
    {
        return $this->belongsTo('App\Value');
    }


}
