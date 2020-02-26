<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Song;
use App\User;

class Lyric extends Model
{
    protected $table = 'lyrics';
    protected $fillable = ['content', 'status', 'song_id', 'user_id'];

    public function song()
    {
        return $this->belongsTo(Song::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
