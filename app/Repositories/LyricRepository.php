<?php

namespace App\Repositories;

use App\Http\Requests\LyricRequest;
use App\Models\Lyric;
use App\Models\Song;
use App\User;
use Illuminate\Support\Facades\Config;

class LyricRepository
{
    public function store(LyricRequest $request)
    {
        $lyric = new Lyric();
        $lyric->content = $request->lyric_content;
        $lyric->user_id = User::loginWeb()->id;
        $song = Song::find($request->lyric_song_id);
        try {
            $song->lyrics()->save($lyric);
            return 0;
        } catch (\Throwable $th) {
        }
        return 1;
    }

    public function update(LyricRequest $request, Lyric $lyric)
    {
        $user = User::loginWeb();
        if ($user->can('update', $lyric)) {
            $lyric->content = $request->lyric_content;
            try {
                $lyric->save();
                return 0;
            } catch (\Throwable $th) {
            }
        }
        return 1;
    }

    public function delete(Lyric $lyric)
    {
        $user = User::loginWeb();
        if ($user->can('delete', $lyric)) {
            try {
                $lyric->delete();
                return 0;
            } catch (\Throwable $th) {
            }
        }
        return 1;
    }

    public function getUserLyric(User $user, Song $song)
    {
        $user_lyric = $user->lyrics()->where('song_id', '=', $song->id)->first();
        return $user_lyric;
    }

    public function getAll()
    {
        $lyrics = Lyric::orderBy('created_at', 'DESC')->get();
        return $lyrics;
    }

    public function updateStatus(LyricRequest $request, Lyric $lyric)
    {
        $status = array_values(Config::get('constants.status'));
        if (isset($request->status) && in_array($request->status, $status)) {
            $lyric->status = $request->status;
            // try {
                $lyric->save();
                return true;
            // } catch (\Throwable $th) {
            // }
        }
        return false;
    }
}
