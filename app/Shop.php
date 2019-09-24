<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Shop extends Model
{
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
   public function shopCategory()
   {
       return $this->belongsTo('App\ShopCategory' , 'category_id');
   }

}
