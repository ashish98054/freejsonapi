<?php

use Faker\Generator as Faker;
use App\Domain\Posts\{ Post, PostComment };
use App\Domain\Users\User;

$factory->define(PostComment::class, function (Faker $faker) {
    return [
        'post_id' => function() { return factory(Post::class)->create()->id(); },
        'user_id' => function() { return factory(User::class)->create()->id(); },
        'body' => $faker->sentence
    ];
});
