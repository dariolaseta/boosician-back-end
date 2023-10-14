<?php

namespace Database\Seeders;

use App\Models\MusicalInstrument;
use App\Models\Musician;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MusicalInstrumentMusicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $instrumentIds = MusicalInstrument::all()->pluck('id')->toArray();
        $musicians = Musician::all();

        foreach ($musicians as $musician) {
            $musician->musicalInstruments()->sync([$faker->randomElement($instrumentIds)]);
        }


        /*
        $musiciansIds = Musician::all()->pluck('user_id');
        $instruments = MusicalInstrument::all();

        foreach ($musicians as $musician) {
            $musician->musicalInstruments()->sync([$faker->randomElement($instrumentIds)]);
        }
        */
    }
}
