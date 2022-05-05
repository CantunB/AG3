<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Agency;
use App\Models\Airline;
use App\User;
use App\Models\Hotel;
use App\Models\PaymentMethods;
use App\Models\Register;
use App\Models\TypeService;
use App\Models\TypeUnit;
use Faker\Generator as Faker;

$factory->define(Register::class, function (Faker $faker) {
    return [
        'date' => $faker->dateTimeBetween('now', 'now'),
        // 'date' => $faker->dateTimeBetween('-1 month', 'now'),
        'agency_id' => $faker->randomElement(Agency::pluck('id')),
        'type_service_id' => $faker->randomElement(TypeService::pluck('id')),
        'origin' => $faker->randomElement(Hotel::pluck('hotel')),
        'zo' => 'Z'. $faker->randomElement([1,13]),
        'terminal' => $faker->randomElement([1,4]),
        'airline' => $faker->randomElement(Airline::pluck('airline')),
        'flight_number' =>  $faker->buildingNumber(),
        'flight_time' => $faker->time(),
        'destiny' =>$faker->randomElement(Hotel::pluck('hotel')),
        'zd' => 'Z'. $faker->randomElement([1,13]),
        'passenger' => $faker->name(),
        'passenger_number' => $faker->randomDigit(),
        'pickup' =>  $faker->time(),
        'requested_unit' => $faker->randomElement(TypeUnit::pluck('id')),
        'place_service' =>  $faker->randomElement(['LOCAL', 'CORREDOR']),
        'observations' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'tariff' => $faker->numberBetween($min = 400, $max = 3700),
        'method_payment' => $faker->randomElement(PaymentMethods::pluck('id')),
        'user_id' => $faker->randomElement(User::pluck('id'))
    ];
});
