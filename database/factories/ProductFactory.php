<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    return [
        'gen_id' => $faker->word,
        'sku_barcode_id' => $faker->word,
        'name' => $faker->word,
        'description' => $faker->word,
        'price' => $faker->randomDigitNotNull,
        'unit_type' => $faker->word,
        'category_id' => $faker->word,
        'supplier_id' => $faker->word,
        'buying_date' => $faker->date('Y-m-d H:i:s'),
        'expire_date' => $faker->date('Y-m-d H:i:s'),
        'is_active' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
