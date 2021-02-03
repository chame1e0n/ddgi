<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Spravochniki\Bank;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Bank::class, function (Faker $faker) {
    return [
        'code' => Str::random(8),
        'name' => $faker->name,
        'filial' => Str::random(10),
        'address' => Str::random(5),
        'inn' => Str::random(7),
        'raschetniy_schet' => Str::random(4)
    ];
});

