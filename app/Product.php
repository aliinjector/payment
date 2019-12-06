<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Ghanem\Rating\Traits\Ratingable as Rating;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
  // use SoftDeletes, Rating, CascadeSoftDeletes;
  use Searchable, SoftDeletes, Rating, CascadeSoftDeletes;
    protected $cascadeDeletes = ['galleries'];
    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];
    protected $casts = [
    'image' => 'array','color' => 'array'
];

public function searchableAs()
{
    return 'title';
}


  public function productCategory()
  {
       return $this->belongsTo('App\ProductCategory','productCat_id');
   }
  public function brand()
  {
       return $this->belongsTo('App\Brand');
   }
   public function shop()
 {
     return $this->belongsTo('App\Shop');
 }

 public function tags()
 {
     return $this->belongsToMany('App\Tag');
 }
 public function wishlist()
 {
     return $this->belongsToMany('App\Wishlist');
 }
 public function compare()
 {
     return $this->belongsToMany('App\Compare');
 }
 public function colors()
 {
     return $this->belongsToMany('App\Color');
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
