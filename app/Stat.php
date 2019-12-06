<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $guarded = ['id'];
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
