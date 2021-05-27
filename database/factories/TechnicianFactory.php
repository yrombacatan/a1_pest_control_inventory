<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Technician;
use Faker\Generator as Faker;

$factory->define(Technician::class, function (Faker $faker) {

    return [
        'first_name' => $faker->word,
        'last_name' => $faker->word,
        'email' => $faker->word,
        'phone' => $faker->word,
        'photo' => $faker->word,
        'is_active' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
