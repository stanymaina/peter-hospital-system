<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'product_name'      =>$faker->sentence($nbWords = 2, $variableNbWords = true),
        'product_category_id'=>$faker->numberBetween($min = 1, $max = 4),
        'product_price'     =>$faker->numberBetween($min = 1000, $max = 70000),
        'product_hire_pruchase_type'=>$faker->numberBetween($min = 1, $max = 4),
        'product_description'=>$faker->sentence($nbWords = 15, $variableNbWords = true),
    ];
});
