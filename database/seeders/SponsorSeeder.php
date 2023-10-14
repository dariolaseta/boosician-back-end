<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsor;
use Carbon\Carbon;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsors = [
            
                ['sponsor_type'=>'bronze',
                'price'=>'2.99',
                'duration'=>"24:00:00"],
            
                ['sponsor_type'=>'silver',
                'price'=>'5.99',
                'duration'=>"72:00:00"],

                ['sponsor_type'=>'gold',
                'price'=>'9.99',
                'duration'=>"144:00:00"]
        ];

        foreach($sponsors as $sponsor){
            $newSponsor = new Sponsor();
            $newSponsor->sponsor_type = $sponsor['sponsor_type'];
            $newSponsor->price = $sponsor['price'];
            $newSponsor->duration = $sponsor['duration'];
            $newSponsor->save();
        }
    }
}
