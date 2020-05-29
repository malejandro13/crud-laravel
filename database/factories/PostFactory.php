<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title_post'       => $faker->title,
        'description_post' => $faker->sentence,
        'user_id'          => $faker->numberBetween(1, 5),
    ];
});
