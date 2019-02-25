<?php
/**
 * Created by PhpStorm.
 * User: fernando.fulanetto
 * Date: 23/02/2019
 * Time: 10:27
 */

namespace App\Models;


class Cart
{
    public $items;
    public function __construct()
    {
        $this->items = [];
    }
    public function add($id, $name, $price, $quantity)
    {
        if(isset($this->items[$id])){
            $this->items[$id]['quantity'] = $quantity;
        }else{
            $this->items[$id] = [
                'quantity' => $quantity,
                'price' => $price,
                'name' => $name
            ];
        }

        return $this->items;
    }
    public function remove($id)
    {
        unset($this->items[$id]);
    }
    public function all()
    {
        return $this->items;
    }
    public function getTotal()
    {
        $total = 0;
        foreach($this->items as $items) {
            $total += $items['quantity'] * $items['price'];
        }
        return $total;
    }
    public function clear()
    {
        $this->items = [];
    }

    public function getImage($product_id){
        $image_id = \App\Models\Product::select('image')->find($product_id);
        $image_path = url("/images/catalogo/$image_id->image.png");
        return $image_path;
    }

}