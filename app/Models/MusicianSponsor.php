<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicianSponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'musician_id',
        'sponsor_id',
        'sponsor_start',
        'sponsor_end',
    ];

    protected $table = 'musician_sponsor';
}
