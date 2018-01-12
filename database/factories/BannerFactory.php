<?php

use Faker\Generator as Faker;

$factory->define(\App\Entities\Banner::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'image' => $faker->imageUrl(1242, 373),
        'url' => $faker->url,
        'status' => 1
    ];
});
