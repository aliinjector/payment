<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Shop extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
    protected $cascadeDeletes = ['ProductCategories' , 'products'];
    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];
    protected $casts = [
        'logo' => 'array',
        'icon' => 'array'
    ];
    public function shopContact()
    {
        return $this->hasOne('App\ShopContact','shop_id');
    }

   public function ProductCategories()
    {
      return $this->hasMany('App\ProductCategory');
    }
    public function products()
   {
       return $this->hasMany('App\Product');
   }
    public function purchases()
   {
       return $this->hasMany('App\UserPurchase');
   }
    public function users()
   {
       return $this->hasMany('App\User');
   }
    public function vouchers()
   {
       return $this->hasMany('App\Voucher');
   }
   public function shopCategory()
   {
       return $this->belongsTo('App\ShopCategory' , 'category_id');
   }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function userVoucher()
    {
        return $this->hasMany('App\UserVoucher');
    }
    public function brands()
    {
        return $this->hasMany('App\Brand');
    }
    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }
    public function template()
    {
        return $this->belongsTo('App\Template');
    }
    public function tags()
    {
        return $this->hasMany('App\Tag');
    }

    public function subscribers()
    {
        return $this->hasMany('App\Subscriber');
    }

    public function newsletters()
    {
        return $this->hasMany('App\Newsletter');
    }
    public function faqs()
    {
        return $this->hasMany('App\FAQ');
    }
    public function wishlists()
    {
        return $this->hasMany('App\Wishlist');
    }
    public function compares()
    {
        return $this->hasMany('App\Compare');
    }

    public function stats()
    {
        return $this->hasMany('App\Stat');
    }



}
