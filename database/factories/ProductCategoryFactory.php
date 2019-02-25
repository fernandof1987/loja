<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProductCategory::class, function (Faker $faker) {
    static $i = 1;
    static $j = 1;
    return [
        'product_id' => $i == 101 ? $i = 1 : $i++,
        'category_id' => $j++ <= 100 ? rand(1, 10) : rand(11, 20)
    ];
});
