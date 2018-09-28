<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Model\User\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Model\User\Tag::class, function (Faker\Generator $faker) {
    $name = $faker->word;

    return [
        'name' => ucfirst($name),
        'slug' => lcfirst($name),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Model\User\Category::class, function (Faker\Generator $faker) {
    $name = implode(" ", $faker->words(mt_rand(1,3)));

    return [
        'name' => ucfirst($name),
        'slug' => str_slug($name),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Model\User\Post::class, function (Faker\Generator $faker) {
    $title = $faker->text;

    return [
        'title' => $title,
        'subtitle' => $faker->text(100),
        'slug' => str_slug($faker->text(100)),
        'body' => $faker->text,
        'posted_by' => 2,
        'image' => $faker->imageUrl(),
        'status' => mt_rand(0, 1),
    ];
});
