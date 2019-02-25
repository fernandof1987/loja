<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;



class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $dates = ['deleted_at'];

    protected $mappedOnly = true;
    
    protected $maps =[
        'Nome' => 'name'
      ];


    public function products(){
        //return $this->belongsToMany(\App\Models\Category::class, 'product_category', 'category_id', 'product_id') ;
        return $this->belongsToMany(\App\Models\Product::class, 'product_category', 'category_id', 'product_id') ;
    }

}
