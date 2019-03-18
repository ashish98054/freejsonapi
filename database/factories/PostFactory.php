<?php

use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;
use App\Domain\Posts\Post;
use App\Domain\Users\User;

$factory->define(Post::class, function (Faker $faker) {
    
    $title_unique = $faker->unique()->sentence;

    return [
        'title' => $title_unique,
        'slug' => $title_unique,
        'body' => $faker->paragraph,
        'featured_image' => Storage::putFile('post', UploadedFile::fake()->image('image.jpg', 720, 360)),
        'user_id' => function() { return factory(User::class)->create()->id(); }
    ];
});
