<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Musician;
use App\Models\MusicalInstrument;
use App\Models\MusicianSponsor;
use App\Models\Review;
use App\Models\Sponsor;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class BoosicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::all();
        $reviews = Review::all();
        $musician = Musician::all();
        $user = Auth::user();
        $currentMusician = $user->musician;


        return view('admin.musicians.show', compact('currentMusician', 'musician', 'user', 'reviews', 'messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $data = $request->validate([
            'surname' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'num_phone' => 'required',
            'image' => 'required',
            'bio' => 'required',
            'cv' => 'required',
            'price' => 'required|numeric|max:9999',
            'musical_genre' => 'required',
        ]);


        $user = Auth::user();

        $newMusician = Musician::create([
            'user_id' => $user->id,
            'surname' => $data['surname'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'num_phone' => $data['num_phone'],
            'image' => $data['image'],
            'bio' => $data['bio'],
            'cv' => $data['cv'],
            'price' => $data['price'],
            'musical_genre' => $data['musical_genre'],
        ]);
        $newMusician->save();

        return redirect()->route('admin.musicians.show', $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(Musician $musician)
    {
        $reviews = Review::all();
        $user = Auth::user();
        $currentMusician = $user->musician;
        $messages = Message::all();

        return view('admin.musicians.show', compact('currentMusician', 'musician', 'user', 'reviews', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Musician $loggedMusician)
    {
        $loggedMusician = Auth::user();
        $musician = Musician::all();
        // $currentMusician = $musician[($loggedMusician->id) - 1];

        $currentMusician = $musician;

        $currentMusician = Musician::findOrFail($loggedMusician->id);

        $musical_instruments = MusicalInstrument::all();

        $sponsors = Sponsor::all();

        return view('admin.musicians.edit', compact('currentMusician', 'loggedMusician', 'musical_instruments', 'sponsors'));
        // return dd($currentMusician);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Musician $musician)
    {
        $reviews = Review::all();
        $messages = Message::all();
        $user = Auth::user();
        $currentMusician = $user->musician;  //recupero il profilo del musicista assocciato all'utente attualmente connesso
        $data = $request->validate([
            'surname' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'num_phone' => 'required',
            'image' => 'required',
            'bio' => 'required',
            'price' => 'required|numeric|max:9999',
            'musical_genre' => 'required',
            'musical_instruments' => ['array', 'exists:musical_instruments,id', 'required'],
        ]);


        if ($request->hasFile('image')) {
            $img_path = Storage::put('uploads/img-profile', $request['image']);
            Storage::delete($musician->image);
            $data['image'] = $img_path;
        }

        if ($request->hasFile('cv')) {
            $cv_path = Storage::put('uploads/cv', $request['cv']);
            $data['cv'] = $cv_path;
            Storage::delete($musician->cv);
        } else {
            $cv_path = 'Non cv inserito';
        }


        $currentMusician->update([
            'user_id' => $user->id,
            'surname' => $data['surname'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'num_phone' => $data['num_phone'],
            'image' => $data['image'],
            'bio' => $data['bio'],
            'cv' => $cv_path,
            'price' => $data['price'],
            'musical_genre' => $data['musical_genre'],
            'musical_instruments' => $data['musical_instruments'],
        ]);

        $currentMusician->save();

        if ($request->has('musical_instruments')) {
            $user->musician->musicalInstruments()->sync($request->musical_instruments);
        }

        //$user->musician->sponsors()->sync($request->sponsors);

        // $valore_sponsor = $request->sponsors;
        // if ($request->sponsors != null) {

        //     $newMusicianSponsor = new MusicianSponsor();

        //     $newMusicianSponsor->musician_id = $user->musician->user_id;


        //     $newMusicianSponsor->sponsor_id = $request->sponsors;

        //     //$data_inizio = $newMusicianSponsor->sponsor_start = now();
        //     $data_inizio = Carbon::parse($newMusicianSponsor->sponsor_start)->addHours(2);

        //     $newMusicianSponsor->sponsor_start = $data_inizio;

        //     //$dataStart = $newMusicianSponsor->sponsor_start->format('Y-m-d H:i:s');
        //     //var_dump($dataStart);
        //     if ($newMusicianSponsor->sponsor_id == 1) {
        //         $newMusicianSponsor->sponsor_end = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($data_inizio)));
        //     } elseif ($newMusicianSponsor->sponsor_id == 2) {
        //         $newMusicianSponsor->sponsor_end = date('Y-m-d H:i:s', strtotime('+3 day', strtotime($data_inizio)));
        //     } else {
        //         $newMusicianSponsor->sponsor_end = date('Y-m-d H:i:s', strtotime('+6 day', strtotime($data_inizio)));
        //     }

        //     if ($newMusicianSponsor->sponsor_end < date("Y-m-d H:i:s")) {
        //         $newMusicianSponsor->active = 0;
        //     } else {
        //         $newMusicianSponsor->active = 1;
        //     }


        //     $newMusicianSponsor->save();

        //     $valore_sponsor = null;
        // }



        //return dd($data_inizio);
        return view('admin.musicians.show', compact('currentMusician', 'user', 'messages', 'reviews'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $musician = Musician::find($id);
        Storage::delete($musician->image);
        Storage::delete($musician->cv);
        $user->delete();
        $musician->delete();
        return redirect()->route('admin.home');
    }

    public function createSponsor(Musician $musician)
    {

        //return dd($musician);
        $sponsors = Sponsor::all();
        $user = Auth::user();
        return view('admin.musicians.createSponsor', compact('sponsors', 'musician', 'user'));
    }

    public function storeSponsor(Request $request)
    {
        $user = Auth::user();

        if ($request->sponsors != null) {

            $newMusicianSponsor = new MusicianSponsor();

            $newMusicianSponsor->musician_id = $user->musician->user_id;


            $newMusicianSponsor->sponsor_id = $request->sponsors;

            //$data_inizio = $newMusicianSponsor->sponsor_start = now();
            $data_inizio = Carbon::parse($newMusicianSponsor->sponsor_start)->addHours(2);

            $newMusicianSponsor->sponsor_start = $data_inizio;

            //$dataStart = $newMusicianSponsor->sponsor_start->format('Y-m-d H:i:s');
            //var_dump($dataStart);
            if ($newMusicianSponsor->sponsor_id == 1) {
                $newMusicianSponsor->sponsor_end = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($data_inizio)));
            } elseif ($newMusicianSponsor->sponsor_id == 2) {
                $newMusicianSponsor->sponsor_end = date('Y-m-d H:i:s', strtotime('+3 day', strtotime($data_inizio)));
            } else {
                $newMusicianSponsor->sponsor_end = date('Y-m-d H:i:s', strtotime('+6 day', strtotime($data_inizio)));
            }

            if ($newMusicianSponsor->sponsor_end < date("Y-m-d H:i:s")) {
                $newMusicianSponsor->active = 0;
            } else {
                $newMusicianSponsor->active = 1;
            }


            $newMusicianSponsor->save();
        }
        $currentMusician = $user->musician;

        return redirect()->route('admin.payments.braintree', $user->musician);
        return view('admin.payments.braintree', compact('currentMusician', 'user'));
    }
}
