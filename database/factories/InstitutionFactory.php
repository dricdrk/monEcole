<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Institution;
use Faker\Generator as Faker;

$factory->define(Institution::class, function (Faker $faker) {
    return [
            'name' => $faker->name,
            'states' => $faker->city,
            'district' => $faker->city,
            'adress' => $faker->address,
            'mail'  => $faker->email,
            'user_id' =>1,
            'phone_number' => $faker->phoneNumber
    ];
});

