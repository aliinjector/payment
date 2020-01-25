<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class UserInformation extends Model
{
  use SoftDeletes, CascadeSoftDeletes;

  protected $dates = ['deleted_at'];
  
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
