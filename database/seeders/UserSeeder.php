<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $gino = new User();
        $gino->name = 'gino';
        $gino->email = 'g@gmail.com';
        $gino->password = Hash::make('12345');
        $gino->save();

        $users=[
            [
                'name'=>'Mario',
                'email'=>'mariuccio@libero.it'
            ],
            [
                'name'=>'Carla',
                'email'=>'carLa@live.com'
            ],
            [
                'name'=>'Geppetto',
                'email'=>'falegnameG@gmail.com'
            ],
            [
                'name'=>'Luigi II',
                'email'=>'reLuigiII@gmail.com'
            ],
            [
                'name'=>'Filippa',
                'email'=>'Fil_zara@gmail.com'
            ],
            [
                'name'=>'Carmine',
                'email'=>'strettoCar@libero.it'
            ],
            [
                'name'=>'Gesuè',
                'email'=>'ilMessia@live.com'
            ],
            [
                'name'=>'Zaira',
                'email'=>'nonnaGiorgi@vico.it'
            ],
            [
                'name'=>'Sandra',
                'email'=>'portamialmarecompriamoilpane@gmail.com'
            ],
            [
                'name'=>'Maria Alessandra',
                'email'=>'pugliaSalento@ventoso.it'
            ],
            [
                'name'=>'Giovanni',
                'email'=>'aldoGiovannieGiacomo@team.it'
            ],
            [
                'name'=>'Igniazio',
                'email'=>'LaRusso@gmail.com'
            ], 
            [
                'name'=>'Raffaella',
                'email'=>'afarlamorecomiciatu@gmail.com'
            ]  
        ];


        foreach($users as $user){
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($faker->password());
            $newUser->save();
        }
    }
}
