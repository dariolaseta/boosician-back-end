<?php

namespace Database\Seeders;

use App\Models\MusicalInstrument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MusicalInstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $instruments = [
            "tromba", "batteria", "chitarra", "basso", "sax", "violino",
        ];

        foreach ($instruments as $instrument) {
            $newInstrument = new MusicalInstrument();
            $newInstrument->name = $instrument;
            $newInstrument->image = $faker->image();
            $newInstrument->save();
        }
    }
}
