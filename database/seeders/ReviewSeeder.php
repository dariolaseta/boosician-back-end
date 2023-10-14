<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Musician;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $musicians = Musician::all();

        $textContent=[
            "Buono, provare per credere",
            "Suona in maniera ottima, sul palco però è un po' piombato",
            "Pessimo, non si è presentato",
            "Ci ha provato tutta la sera con mia figlia ... però è capace",
            "Ottimo",
            "Sono stato a una sua live ... davvero interessante",
            "Il suo profilo instagram è molto interessante",
            "Gli piace la nutella",
            "Non ho mai visto qualcosa del genere",
            "Pessimo",
            "Ha ancora da imparare ma c'è tanto talento",
            "Era ubriaco, sembrava Grignani ",
            "Appena fa la prossima festa ci torno",
            "Mi ha scroccato una cena in cambio di una storia, vendendomela come pubblicità",
            "Ha rotto il suo strumento a fine esibizione",
            "Era meglio come fantino",
            "Bravo, bravissimo",
            "E' fantastico superfantastico",
            "E' stato un piacere ospitarlo nel mio locale",
            "Mentre suona balla, palleggia e strira le camicie"
        ];

        foreach($musicians as $musician){
            $randomNumber = rand(90, 100);
            
            for($i = 0; $i <= $randomNumber; $i++){
            $rand_index = array_rand($textContent);
            $newReview = new Review();
            $newReview -> musician_id = $musician->id;
            $newReview -> content = $textContent[$rand_index];
            $newReview -> vote = $faker->numberBetween(1, 5);
            $newReview -> created_at = $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d');
            $newReview -> save();
            }
        }
    }
}
