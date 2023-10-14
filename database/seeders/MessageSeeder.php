<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Message;
use App\Models\Musician;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $musicians= Musician::all();


    $messageText=[
        'Ciao puoi venire a suonare al compleanno di mia figlia il 15 agosto?',
        'Domani sera saresti libero? Abbiamo un palco da riempire.',
        'Puoi venira alla sagra del cotechino? Doppio compenso $$ .',
        'Mi serve un musiciasta per domani, puoi venire in via marino 4.',
        "Ciao sto formando una band ma mi manca un' elemento sei interessato?",
        'Ciao siamo quelli di universal ... vogliamo fare un dico',
        'Ciao puoi venire a suonare al compleanno di mia figlia il 10 dicembre?',
        'Il 4 novembre saresti libero? Abbiamo un palco da riempire.',
        'Puoi venire a suonare alla festa della birra? Per te tutto gratis .',
        'Pensi di avere il fattore X? Il 20 Ottobre iniziano le selezioni',
        'AAA cercasi musicista per soundcheck.'
    ];

    
    
    foreach($musicians as $musician){
        $randomNumber = rand(199, 200 );
        
        for($i = 0; $i < $randomNumber; $i++){
            $rand_index = array_rand($messageText);
            $newMessage = new Message();
            $newMessage->musician_id = $musician->id;
            $newMessage->name=$faker->name();
            $newMessage->mail=$faker->email();
            $newMessage->message= $messageText[$rand_index];
            $newMessage->created_at = $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d');
            $newMessage->save();
            }
        }



    }
}
