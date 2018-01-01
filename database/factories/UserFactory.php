<?php

use Faker\Generator as Faker;


$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    $gender = ['male','female'];
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'role' => 'regular',
        'department_id' => rand(1,15),
        'job_title' => $faker->jobTitle,
        'phone' => $faker->phoneNumber,
        'gender'=>$gender[rand(0,1)],

    ];
});
