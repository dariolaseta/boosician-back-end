<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Musician;

class Message extends Model
{
    public function musician(){
        return $this->belongsTo(Musician::class);
    }

    use HasFactory;
}
