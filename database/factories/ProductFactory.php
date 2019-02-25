<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->unique()->word),// . " " . (string)rand(0, 200) ,
        'description' => $faker->sentence(4), //$faker->text(60)
        'price' => rand(1, 100) / 10,
        'image' => rand(0, 7)
    ];
});
