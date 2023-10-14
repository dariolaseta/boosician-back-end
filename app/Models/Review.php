<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'musician_id',
        'vote',
        'content',

    ];
    public function musician(){
        return $this->belongsTo(Musician::class);
    }

    use HasFactory;
}
