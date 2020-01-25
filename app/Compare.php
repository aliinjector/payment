<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;



class Compare extends Model {
  use SoftDeletes, CascadeSoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function products() {
        return $this->belongsToMany('App\Product');
    }

    public function shop() {
        return $this->belongsTo('App\Shop');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
