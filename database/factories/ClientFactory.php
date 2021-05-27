<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {

    return [
        'customer' => $faker->word,
        'abnnum' => $faker->word,
        'faxnum' => $faker->word,
        'address' => $faker->text,
        'bill_attntion' => $faker->word,
        'bill_address' => $faker->text,
        'bill_city' => $faker->word,
        'bill_state' => $faker->word,
        'bill_pcode' => $faker->word,
        'bill_cntry' => $faker->word,
        'bill_taxrate' => $faker->word,
        'bill_payment' => $faker->word,
        'is_active' => $faker->word,
        'profile_image' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
