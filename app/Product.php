<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Ghanem\Rating\Traits\Ratingable as Rating;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Product extends Model
{
  // use SoftDeletes, Rating, CascadeSoftDeletes, Sluggable, Searchable;
  use SoftDeletes, Rating, CascadeSoftDeletes, Sluggable;
    protected $cascadeDeletes = ['galleries', 'facilities','rates','comments'];
    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];
    protected $casts = [
    'image' => 'array','color' => 'array'
];

public function sluggable()
   {
       return [
           'slug' => [
               'source' => 'title'
           ]
       ];
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
 public function specifications()
 {
     return $this->belongsToMany('App\Specification');
 }
 public function compare()
 {
     return $this->belongsToMany('App\Compare');
 }
 public function colors()
 {
     return $this->belongsToMany('App\Color');
 }
 public function features()
 {
     return $this->belongsToMany('App\Feature')->withPivot('value');;
 }
 public function carts()
 {
     return $this->belongsToMany('App\Cart');
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

    public function Facilities()
    {
        return $this->hasMany('App\Facility');
    }



}
