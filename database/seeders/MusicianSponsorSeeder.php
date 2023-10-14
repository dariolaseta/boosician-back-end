<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Sponsor;
use App\Models\Musician;
use App\Models\MusicianSponsor;

class MusicianSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(Faker $faker): void
    {
        $sponsors = Sponsor::all()->pluck('id');
        $musicians = Musician::all();

        foreach ($musicians as $musician) {
            //$musician->sponsors()->sync([$faker->randomElement($sponsors)]);

            $newMusicianSponsor = new MusicianSponsor();

            $newMusicianSponsor->musician_id = $musician->user_id;
            $newMusicianSponsor->sponsor_id = $faker->randomElement($sponsors);
            $newMusicianSponsor->sponsor_start = $faker->dateTimeBetween('-30 week');

            $dataStart = $newMusicianSponsor->sponsor_start->format('Y-m-d H:i:s');
            //var_dump($dataStart);
            if ($newMusicianSponsor->sponsor_id == 1) {
                $newMusicianSponsor->sponsor_end = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($dataStart)));
            } elseif ($newMusicianSponsor->sponsor_id == 2) {
                $newMusicianSponsor->sponsor_end = date('Y-m-d H:i:s', strtotime('+3 day', strtotime($dataStart)));
            } else {
                $newMusicianSponsor->sponsor_end = date('Y-m-d H:i:s', strtotime('+6 day', strtotime($dataStart)));
            }

            if ($newMusicianSponsor->sponsor_end < date("Y-m-d H:i:s")) {
                $newMusicianSponsor->active = 0;
            } else {
                $newMusicianSponsor->active = 1;
            }


            $newMusicianSponsor->save();
        }
    }
}
