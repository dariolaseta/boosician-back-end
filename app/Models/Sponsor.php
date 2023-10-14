<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'sponsor_type',
        'price',
        'duration',
    ];

    public function musicians()
    {
        return $this->belongsToMany(Musician::class, 'musician_sponsor')->withPivot('sponsor_start', 'sponsor_end', 'active');
    }
}
