<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cart extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];


    public function products()
    {
        return $this->belongsToMany('App\Product')->get();
    }
    public function cartProduct()
    {
        return $this->hasMany('App\CartProduct');
    }
}
