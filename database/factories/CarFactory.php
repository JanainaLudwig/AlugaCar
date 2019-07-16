<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'price' => $faker->numberBetween(1, 20)
    ];
});



$factory->afterCreating(App\Car::class, function (Car $car, Faker $faker) {
    //Create image
    $directory = "public/cars/{$car->id}";

    \Illuminate\Support\Facades\Storage::makeDirectory($directory);

    $image = $faker->image(storage_path("/app/public/cars/{$car->id}"), 640, 480, 'transport');
    $image = str_replace('\\', '/', $image);

    $car->image = substr($image, strpos($image, 'cars'));
//
//    $car->image = \Illuminate\Support\Facades\Storage::disk('public')->files("/cars/{$car->id}")[0];

    $car->save();
});
