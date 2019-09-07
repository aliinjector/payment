<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    protected $guarded = ['id'];


    public function wallet()
    {
        return $this->belongsTo('App\Wallet');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }



}
