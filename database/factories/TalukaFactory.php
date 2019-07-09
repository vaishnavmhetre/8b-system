<?php

/* @var $factory Factory */

use App\Taluka;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Taluka::class, function (Faker $faker) {
    return [
        'district_id' => getRandomOrCreate(\App\District::class)->id
    ];
});
