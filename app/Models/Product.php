<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'image'];

    protected $dates = ['deleted_at'];

    public function categories(){
        return $this->belongsToMany(\App\Models\Category::class, 'product_category', 'product_id', 'category_id') ;
    }

    public function getImage(){
        $image_path = url("/images/catalogo/$this->image.png");
        return $image_path;
    }

    public function scopeSearch($query, $keyword)
    {
        if ($keyword != '') {
            $query
                ->leftJoin('product_category', 'products.id', '=', 'product_category.product_id')
                ->leftJoin('categories', 'product_category.category_id', '=', 'categories.id')
                ->where('products.name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('products.id', 'LIKE', '%' . $keyword . '%')
                ->orWhere('categories.name', 'LIKE', '%' . $keyword . '%')
                ->select('products.*')
                ->distinct();
        }
        return $query;
    }

}
