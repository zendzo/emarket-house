<?php

use Illuminate\Database\Seeder;
use App\Perumahan;

class PerumahansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perumahan::create([
            'name' => 'Perumahan Citra Indah Lestari',
            'address' => 'Jl. Soekarno Hatta Tanjunngpinang',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis illo at vel cupiditate voluptates reiciendis officia, fuga assumenda illum et architecto, blanditiis modi? Delectus non quas assumenda incidunt, tenetur labore.'
        ]);
    }
}
