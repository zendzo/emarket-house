<?php

use Faker\Generator as Faker;

$factory->define(App\Rumah::class, function (Faker $faker) {
    return [
        'rumah_type_id' => rand(1,2),
        'perumahan_id' => rand(1,2),
        'block' => 'A',
        'number' => rand(1,10),
        'subsidi' => 'subsidi',
        'harga' => 145000000,
        'booked_by' => rand(3,5),
        'document_approved' => false,
    ];
});
