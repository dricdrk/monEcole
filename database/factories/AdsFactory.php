<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ads;
use Faker\Generator as Faker;

$factory->define(Ads::class, function (Faker $faker) {
    return [
        'nmbrOfDays' =>rand (0,30),
        'amount' =>rand (10,30000),
        'institution_name'=>$faker->city,
        'service_description' => $faker->paragraph, 
        'pub_url_flyers' => $faker->name, 
        'user_id' => 1, 
        'logo' => rand(1,5), 
    ];
});
