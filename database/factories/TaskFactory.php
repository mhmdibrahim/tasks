<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
$factory->define(\App\Task::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,100),
        'content' => $faker->realText(200),
        'created_at' => $faker->dateTimeBetween(Carbon::today()->subDays(10),Carbon::tomorrow())
    ];
});
