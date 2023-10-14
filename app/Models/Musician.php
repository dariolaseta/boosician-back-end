<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;

class Musician extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'surname',
        'birth_date',
        'address',
        'num_phone',
        'image',
        'bio',
        'cv',
        'price',
        'musical_genre',
        'instrument'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function musicalInstruments()
    {
        return $this->belongsToMany(MusicalInstrument::class);
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'musician_sponsor')->withPivot('sponsor_start', 'sponsor_end', 'active');
    }
}
