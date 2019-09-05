<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\UserInformation');
    }



}
