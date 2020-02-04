<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'description' => $faker->paragraph,
        "priority" => $faker->randomElement(["High", "Normal"])
    ];
});
