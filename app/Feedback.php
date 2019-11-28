<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $guarded = ['id'];
    protected $table = 'feedbacks';

    public function shop(){
      return belongTo('App\Shop');
    }
}
