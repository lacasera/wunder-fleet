<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AccessToken;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(AccessToken::class, function (Faker $faker) {
    return [
        'token' => Str::random(30),
        'expires_at' => now()->addDays(30),
        'user_id' => factory(\App\User::class)
    ];
});
