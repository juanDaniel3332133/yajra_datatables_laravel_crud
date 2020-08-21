<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
	
    $statuses = ['activo','inactivo'];

	$first_name = $faker->firstName; 
	$last_name = $faker->lastName; 
	$full_name = "{$first_name} {$last_name}";

    return [
        'first_name'  => $first_name,
        'last_name'   => $last_name,
        'name'   	  => $full_name,
        'email'       => $faker->unique()->safeEmail,
        'profile_image_path' => $faker->imageUrl(),
        'status'      => $statuses[$faker->numberBetween(0,1)],
    ];
});
