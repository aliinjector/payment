<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model{

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function checkouts()
    {
        return $this->hasMany('App\Checkout');
    }



}
