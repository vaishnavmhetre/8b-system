<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'taluka_id' => getRandomOrCreate(\App\Taluka::class)->id,
        'talathi_id' => getRandomOrCreate(\App\User::class)->id
    ];
});
