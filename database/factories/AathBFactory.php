<?php

/* @var $factory Factory */

use App\AathB;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(AathB::class, function (Faker $faker) {
    return [
        'tenure_id' => getRandomOrCreate(\App\Tenure::class)->id,
        'city_id' => getRandomOrCreate(\App\City::class)->id,
    ];
});
