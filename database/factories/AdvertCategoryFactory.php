<?php

use Faker\Generator as Faker;
use App\Entity\Adverts\Category;
// use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    $active = $faker->boolean;
    return [
        'name' => $faker->unique()->name,
        'slug' => $faker->unique()->slug(2),
        'parent_id' => null
    ];
});
