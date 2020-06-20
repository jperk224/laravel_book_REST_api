<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'author_id' => rand(1, App\Author::count()),
        'abstract' => $faker->paragraph(10)
    ];
});
