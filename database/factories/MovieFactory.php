<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        'slug' => $faker->slug,
        'name' => $faker->name,
        'original_name' => $faker->name,
        'duration_in_minutes' => $faker->randomNumber(2),
        'plot_summary' => $faker->text(500),
        'image_url' => $faker->imageUrl(),
    ];
});
