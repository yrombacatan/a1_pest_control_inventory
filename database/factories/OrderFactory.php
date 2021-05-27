<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    return [
        'transac_no' => $faker->word,
        'transac_date' => $faker->date('Y-m-d H:i:s'),
        'order_by' => $faker->word,
        'total_order_cost' => $faker->randomDigitNotNull,
        'remarks' => $faker->text,
        'order_stat' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
