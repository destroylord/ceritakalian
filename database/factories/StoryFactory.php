<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Story;
use Faker\Generator as Faker;

$factory->define(Story::class, function (Faker $faker) {
    return [
        //
        'category_id'   => rand(1,3),
        'user_id'       => 1,
        'thumbnail'     => $faker->imageUrl($width = 640, $height = 480),
        'title'         => $faker->sentence(),
        'slug'          => \Str::slug($faker->sentence()),
        'body'          => $faker->text()
    ];
});
