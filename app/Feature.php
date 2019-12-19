<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{


    public function productCategory()
    {
        return $this->belongsTo('App\ProductCategory','productCat_id');
    }



}
