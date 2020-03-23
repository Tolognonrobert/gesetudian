<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Personne;
use Faker\Generator as Faker;

$factory->define(Personne::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'streetName' => $faker->streetName,
        'state' => $faker->state,
        'phoneNumber' => $faker->phoneNumber
        
    ];
});
