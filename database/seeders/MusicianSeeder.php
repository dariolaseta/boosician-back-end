<?php

namespace Database\Seeders;

use App\Models\Musician;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MusicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $users = User::all();

        $stateAbbr = " IT";
        $city = " Milano";
        $prefixPhone = "(+39) ";

        $musicians=[
            [
              'address'=>'Via Roma 15',
              'image'=>'https://www.ilnapolista.it/wp-content/uploads/2021/01/gino-paoli-al-premio-chiara-674486.610x431.jpg',
              'bio'=>'Da sempre appassionato di musica ha iniziato i suoi studi in gioventù, a 14 anni la prima canzone ora un fenomeno mondiale.',
              'surname'=>'Paoli',
              'cv'=>'https://www.slideteam.net/media/catalog/product/cache/1280x720/b/u/business_professional_resume_sample_a4_cv_template_slide02.jpg',
              'musicial_genre'=>'Pop-rock',
              'id'=>1
            ],
            [
                'address'=>'Via Torino 2A',
                'image'=>'https://meiweb.it/wp_2017/wp-content/uploads/2020/04/Gianna-Nannini.jpg',
                'bio'=>'Da sempre appassionato di musica ha iniziato i suoi studi in gioventù, a 20 anni la prima canzone ora un fenomeno.',
                'surname'=>'Falafel',
                'cv'=>'https://grammarholic.com/cdn/shop/products/smartmockups_krerrw45.jpg?v=1627136656',
                'musicial_genre'=>'Classica',
                'id'=>2
            ],
            [
                'address'=>'Via Panza 160',
                'image'=>'https://img.ilgcdn.com/sites/default/files/styles/xl/public/foto/2019/10/11/1570788678-kurt-st-thomas-1991-cropped.jpg?_=1570788937',
                'bio'=>'Da sempre appassionato di musica ha iniziato i suoi studi in gioventù, a 50 anni la prima canzone ora ci può stare.',
                'surname'=>'Pinocchio',
                'cv'=>'https://cvgenius.com/wp-content/uploads/resume-template.png',
                'musicial_genre'=>'Neomelodica',
                'id'=>3
            ],
            [
                'address'=>'Vicolo Corto 9',
                'image'=>'https://www.tshaonline.org/images/handbook/entries/JJ/janis-joplin-05.jpg',
                'bio'=>'Approdato da poco nel mondo della musica ha già riscosso diverso successo specialmente tra i più anziani.',
                'surname'=>'Sovrano I',
                'cv'=>'https://grammarholic.com/cdn/shop/products/smartmockups_krerrw45.jpg?v=1627136656',
                'musicial_genre'=>'Pop',
                'id'=>4
            ],
            [
                'address'=>'Vicolo stretto 10',
                'image'=>'https://www.rollingstone.it/wp-content/uploads/2022/02/slash-austin-nelson.jpg',
                'bio'=>'Approdato da poco nel mondo della musica ha già riscosso diverso successo. ',
                'surname'=>'Cappello',
                'cv'=>'https://cvgenius.com/wp-content/uploads/resume-template.png',
                'musicial_genre'=>'Rap',
                'id'=>5
            ],
            [
                'address'=>'Piazza delle castagne 50',
                'image'=>'https://ilmanifesto.it/cdn-cgi/image/width=1400,format=auto,quality=85/https://static.ilmanifesto.it/2021/05/2vis1aperturawinehouse-classic-albums.jpg',
                'bio'=>"Con all' attivo ben 15 album e pronto per sfornarne un 16°.",
                'surname'=>'Signorini',
                'cv'=>'https://www.cakeresume.com/cdn-cgi/image/fit=scale-down,format=auto,w=1200/https://images.cakeresume.com/images/d2484ad9-387e-4789-b22e-aa5dd33fc9b7.png',
                'musicial_genre'=>'Metal',
                'id'=>6
            ],
            [
                'address'=>'Piazzale Gino 14R',
                'image'=>'https://media.pitchfork.com/photos/64b6f94b3a4e400bc3c5ba70/master/pass/Tupac-Shakur-2Pac.jpg',
                'bio'=>"Con all' attivo ben 2 album e pronto per sfornarne un 3°.",
                'surname'=>'Rabat',
                'cv'=>'https://www.cakeresume.com/cdn-cgi/image/fit=scale-down,format=auto,w=1200/https://images.cakeresume.com/images/d2484ad9-387e-4789-b22e-aa5dd33fc9b7.png',
                'musicial_genre'=>'Techno',
                'id'=>7
            ],
            [
                'address'=>'Via Ugo Bassi 3',
                'image'=>'https://lastatalenews.unimi.it/sites/default/files/styles/paragraph_image/public/image/cover/Enrico-Mentana_interno_cover.jpg?h=8621808d&itok=Y9PqY-HW',
                'bio'=>'Artista emergente appena arrivato sul panorama cittadino',
                'surname'=>'Marinelli',
                'cv'=>'https://www.slideteam.net/media/catalog/product/cache/1280x720/b/u/business_professional_resume_sample_a4_cv_template_slide02.jpg',
                'musicial_genre'=>'Jazz',
                'id'=>8
            ],
            [
                'address'=>'Via Carlino Basso 45',
                'image'=>'https://www.unadonnalgiorno.it/wp-content/uploads/2022/05/Skin_Skunk_Anansie-copia.jpg',
                'bio'=>'10 Anni di studio in conservatorio, 3 di fermo e poi riparte',
                'surname'=>'Zebe',
                'cv'=>'https://cdn-images.resumelab.com/pages/google_docs_templates_resumelab_new_5.png?1579701434',
                'musicial_genre'=>'Blus',
                'id'=>9 
            ],
            [
                'address'=>'Largo Augosto 78',
                'image'=>'https://hips.hearstapps.com/gioia-it/assets/17/37/1505399367-courtney-love.jpg',
                'bio'=>'5 Anni di studio in conservatorio, 8 di fermo e poi riparte',
                'surname'=>'Mattoni',
                'cv'=>'https://www.slideteam.net/media/catalog/product/cache/1280x720/b/u/business_professional_resume_sample_a4_cv_template_slide02.jpg',
                'musicial_genre'=>'Rock',
                'id'=>10
            ],
            [
                'address'=>'Via Palla al Piedi 10',
                'image'=>'https://www.daninseries.it/wp-content/uploads/2021/12/Il-Ritorno-di-Mary-Poppins.jpg',
                'bio'=>'Arrivato direttamente dalla Jamaica oggi stabilito in pianta stabile a Milano.',
                'surname'=>'Lazzarin',
                'cv'=>'https://cdn-images.resumelab.com/pages/google_docs_templates_resumelab_new_5.png?1579701434',
                'musicial_genre'=>'Elettronica',
                'id'=>11
            ],
            [
                'address'=>'Viale alberato 80',
                'image'=>'https://www.donnaglamour.it/wp-content/uploads/2020/07/IM_Massimo_Boldi_4.jpg',
                'bio'=>'Arrivato direttamente dalla Sardegna oggi stabilito in pianta stabile a Milano.',
                'surname'=>'Bettolini',
                'cv'=>'https://www.cakeresume.com/cdn-cgi/image/fit=scale-down,format=auto,w=1200/https://images.cakeresume.com/images/d2484ad9-387e-4789-b22e-aa5dd33fc9b7.png',
                'musicial_genre'=>'Classica',
                'id'=>12
            
            ],
            [
                'address'=>'Via booleana 8',
                'image'=>'https://static.independent.co.uk/2021/09/03/10/GettyImages-1210507516.jpg',
                'bio'=>'Tipo strano ma piace.',
                'surname'=>'la Ruzza',
                'cv'=>'https://cvgenius.com/wp-content/uploads/resume-template.png',
                'musicial_genre'=>'Gospel',
                'id'=>13
            ],
            [
                'address'=>'Piazza al kebab 118',
                'image'=>'https://www.corriere.it/methode_image/2021/07/05/Spettacoli/Foto%20Spettacoli%20-%20Trattate/raffaella-carra_STRA_DKT-kQoG-U32701704844493ucG-656x492@Corriere-Web-Sezioni.jpg',
                'bio'=>"Nata a Bologna con un talento spiccato per tutto l'ambito musicale ... suona canta e balla.",
                'surname'=>'Scarra',
                'cv'=>'https://cvgenius.com/wp-content/uploads/resume-template.png',
                'musicial_genre'=>'Pop',
                'id'=>14
            ]

        ];

        foreach ($musicians as $key=> $musician) {
            $newMusician = new Musician();
            $newMusician ->user_id = $musician['id'];
            $newMusician->birth_date = $faker->dateTimeInInterval('-30 years', '-20 years');
            $newMusician->address = $musician['address'] . $city . $stateAbbr;
            $newMusician->num_phone = $prefixPhone . $faker->numerify('###-###-####');
            $newMusician->image = $musician['image'];
            $newMusician->bio = $musician['bio'];
            $newMusician->surname = $musician['surname'];
            $newMusician->cv = $musician['cv'];
            $newMusician->price = $faker->numberBetween( 30, 100);
            $newMusician->musical_genre = $musician['musicial_genre'];
            $newMusician->save();
        }
    }
}
