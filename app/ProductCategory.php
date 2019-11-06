<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
    protected $cascadeDeletes = ['products'];

  protected $dates = ['deleted_at'];
  protected $guarded = ['id'];

  public function products()
   {
       return $this->hasMany('App\Product','productCat_id','id');
   }
  public function children()
   {
     return $this->hasMany($this, 'parent_id')->with('children');
   }
  public function parent()
   {
     return $this->belongsTo($this, 'parent_id')->with('parent');
   }
   public function shop()
  {
      return $this->belongsTo('App\Shop');
  }

}
