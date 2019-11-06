<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
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


    public function userInformation()
    {
        return $this->hasOne('App\UserInformation');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public function fastPays()
    {
        return $this->hasMany('App\FastPay');
    }

    public function gateways()
    {
        return $this->hasMany('App\Gateway');
    }

    public function shop()
   {
       return $this->hasOne('App\Shop');
   }

    public function cart()
   {
       return $this->hasOne('App\Cart');
   }

    public function checkouts()
    {
        return $this->hasMany('App\Checkout');
    }
    public function purchases()
    {
        return $this->hasMany('App\UserPurchase');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }




}
