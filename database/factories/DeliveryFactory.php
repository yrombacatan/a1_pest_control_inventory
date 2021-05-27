<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Delivery;
use Faker\Generator as Faker;

$factory->define(Delivery::class, function (Faker $faker) {

    return [
        'ref_no' => $faker->word,
        'transac_date' => $faker->date('Y-m-d H:i:s'),
        'supplier_id' => $faker->word,
        'total_prod_costs' => $faker->randomDigitNotNull,
        'remarks' => $faker->text,
        'is_active' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
