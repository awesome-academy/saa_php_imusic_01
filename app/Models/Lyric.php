<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Song;

class Lyric extends Model
{
    protected $table = 'favourite_lists';

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
