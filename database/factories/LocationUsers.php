<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LocationUsers;
use Faker\Generator as Faker;

$factory->define(LocationUsers::class, function (Faker $faker) {
    return [
        "location_id" => rand(1, 10),
        "user_id" => rand(1, 30),
    ];
});
