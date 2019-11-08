<?php
namespace App;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ghanem\Rating\Traits\Ratingable as Rating;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use SoftDeletes, Rating;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];
    protected $casts = [
    'image' => 'array'
];


  public function productCategory()
  {
       return $this->belongsTo('App\ProductCategory','productCat_id');
   }
   public function shop()
 {
     return $this->belongsTo('App\Shop');
 }

 public function tags()
 {
     return $this->belongsToMany('App\Tag');
 }
 public function carts()
 {
     return $this->belongsToMany('App\Cart');
 }
 public function purchases()
 {
     return $this->hasMany('App\UserPurchase');
 }
 public function rates()
 {
     return $this->hasMany('App\Rating','ratingable_id');
 }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function galleries()
    {
        return $this->hasMany('App\Gallery');
    }


}
