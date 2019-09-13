<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Wallet extends Eloquent
{
    protected $guarded = ['id'];

    public function checkouts()
    {
        return $this->embedsMany('App\Checkout');
    }



}
