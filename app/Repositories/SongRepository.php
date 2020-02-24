<?php 
namespace App\Repositories;

use App\Models\Comment;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class SongRepository
{
    public function addView(Song $song)
    {
        $song->count = $song->count + 1;
        $song->save();
    }
}
