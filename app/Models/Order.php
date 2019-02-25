<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'total', 'status'];

    protected $dates = ['deleted_at'];

    public function items()
    {
        return $this->hasMany('App\Models\OrderItem');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function details()
    {
        return $this->hasOne('App\Models\DeliveryDetail');
    }

}
