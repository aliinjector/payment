<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function shopContact()
    {
        return $this->hasOne('App\ShopContact');
    }
}
