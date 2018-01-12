<?php

use Faker\Generator as Faker;

$factory->define(\App\Entities\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'icon' => $faker->randomLetter,
        'status' => 1
    ];
});
