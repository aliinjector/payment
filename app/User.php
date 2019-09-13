<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Notifications\Notifiable;


class User extends Eloquent implements Authenticatable{

    use Notifiable;
    use AuthenticableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wallets()
    {
        return $this->hasMany('App\Wallet');
    }

    public function cards()
    {
        return $this->hasMany('App\Card');
    }

    public function checkouts()
    {
        return $this->hasMany('App\Checkout');
    }



    public function userInformation()
    {
        return $this->hasOne('App\UserInformation');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public function gateways()
    {
        return $this->hasMany('App\Gateway');
    }

    public function shop()
   {
       return $this->hasOne('App\Shop');
   }



}
