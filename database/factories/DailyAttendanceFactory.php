<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DailyAttendance;
use Faker\Generator as Faker;

$factory->define(DailyAttendance::class, function (Faker $faker) {
    return [

        'emp_id'=>  $faker->numberBetween(1, App\User::count()), 
        'date'=> $faker->date,
        'start'=> $faker->time,
        'end'=> $faker->time,
        
    ];
});
