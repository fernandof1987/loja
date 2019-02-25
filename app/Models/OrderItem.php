<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class OrderItem extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'order_id', 'quantity', 'price'];

    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
