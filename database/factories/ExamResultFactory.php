<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ExamResult;
use Faker\Generator as Faker;
$categorie=null;
//CREATE CATEGORIE FUNCTION
function categories($number_of_people){
    $cat=$number_of_people/20;
    $cat=(int)$cat;
    $cat++;
    switch ($cat) {
        case 1:
            $categorie=10;
            break;
        case 2:
            $categorie=9;
            break;
        case 3:
            $categorie=8;
            break;
        case 4:
            $categorie=7;
            break;
        case 5:
            $categorie=6;
            break;
        case 6:
            $categorie=5;
            break;
        case 7:
            $categorie=4;
            break;
        case 8:
            $categorie=3;
            break;
        case 9:
            $categorie=2;
            break;
        case 10:
            $categorie=1;
            break;
    }
    return $categorie;
}
$factory->define(ExamResult::class, function (Faker $faker) {
    $all=rand(0,200);
    $categorie=categories($all);
    return [
            'name' => $faker->city,
            'number_of_people' => $all ,
            'number_of_people_received'  =>rand (0,$all),
            'categories' => $categorie, 
            'institution_id' =>1, 
    ];
});

