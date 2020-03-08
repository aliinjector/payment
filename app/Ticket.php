<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;


class Ticket extends Model
{
  use SoftDeletes, CascadeSoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function answers(){
      return $this->hasMany(Answer::class);
    }

    public function buzzes(){
        return $this->hasMany(Buzz::class);
    }


}
