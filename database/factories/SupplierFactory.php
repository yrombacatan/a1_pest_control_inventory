<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'phone' => $faker->word,
        'address' => $faker->word,
        'city' => $faker->word,
        'type' => $faker->word,
        'photo' => $faker->word,
        'shop_name' => $faker->word,
        'account_holder' => $faker->word,
        'account_number' => $faker->word,
        'bank_name' => $faker->word,
        'bank_branch' => $faker->word,
        'is_active' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
