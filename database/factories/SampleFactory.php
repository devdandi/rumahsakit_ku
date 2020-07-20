<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SampleDummy;
use Faker\Generator as Faker;

$factory->define(App\Sample::class, function (Faker $faker) {
    return [
        'id_pasien' => $faker->text(200),
        'data' => $faker->unique()->safeEmail,
        'cash' => $faker->text(200),
        'kembali' => $faker->text(200),
        'status' => $faker->text(200)
    ];
});
