<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use App\Brand;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [

        'sku' => $faker->word,
        'name' => $faker->name,
        'price' => $faker->randomFloat(2, 0, 999999),
        'description' => $faker->sentence(6),
        'stock' => $faker->numberBetween(0, 100),
        'image' =>"('storage/notebook.jpg')",
        'brand_id' => App\Brand::all()->random()->id,
        'category_id' => App\Category::all()->random()->id,
    ];
});
