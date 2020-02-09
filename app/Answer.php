<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $gaurded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function ticket(){
      return $this->belongsTo(Ticket::class);
    }
}
