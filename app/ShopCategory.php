<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;


class ShopCategory extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
    protected $cascadeDeletes = ['shops'];
    protected $dates = ['deleted_at'];

    public function shops()
    {
        return $this->hasMany('App\Shop');
    }
}
