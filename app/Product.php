<?php
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use SoftDeletes;
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
}
