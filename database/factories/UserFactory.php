<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'phoneNumber' =>$faker->phoneNumber,
        'password' => bcrypt('secret'),
        'verifyToken' => str_random(50),
        'status' =>$faker->boolean,
        'role' => 'user',
        'remember_token' => str_random(10),
    ];
});


// $factory->define(App\Profile::class, function (Faker $faker) {
//     return [
//         'user_id' => function () {
//            return factory(App\User::class)->create()->id;
//         },
//         'city' => $faker->city,
//         'country' => $faker->country,
//         'zipcode' => $faker->randomDigit,
//         'streetaddress' =>$faker->streetAddress,
//         'dateofbirth' =>$faker->dateTime('2014-02-25 08:37:17'),
//         'profileimage' => 'Null',
//         'bio' =>$faker->text($maxNbChars = 100),
//         'balance' => $faker->randomDigit,
        
//     ];
// });