<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class DeliveryDetail extends Model
{
    use SoftDeletes;

    protected $fillable = ['order_id', 'cep', 'address', 'city', 'uf', 'obs'];

    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

}
