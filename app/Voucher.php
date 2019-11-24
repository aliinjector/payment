<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Voucher extends Model
{
    use SoftDeletes;

    protected $casts = ['users' => 'array'];
    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
