<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Models\Song;
use App\User;
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

    public function isFavourite(User $user, Song $song)
    {
        $favourite_list = $user->favouriteList;
        if ($favourite_list) {
            return $favourite_list->songs()->where('song_id', $song->id)->count();
        }
        return 0;
    }
}
