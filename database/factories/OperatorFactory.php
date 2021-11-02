<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Operator;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Operator::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement([$faker->firstNameFemale(), $faker->firstNameMale()]),
        'paterno' => $faker->lastName,
        'materno' => $faker->lastName(),
        // 'phone' => $faker->phoneNumber(10),
        'email' => $faker->safeEmail,
        'second_email' => $faker->freeEmail(),
        //'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'birthday_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'address' => $faker->address(),
        'cp' => $faker->postcode(),
        'status' => $faker->randomElement([Operator::operador_activo, Operator::operador_no_activo]),
    ];
});
