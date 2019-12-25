<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'payment_data_id' => \Illuminate\Support\Str::random(96)
    ];
});
