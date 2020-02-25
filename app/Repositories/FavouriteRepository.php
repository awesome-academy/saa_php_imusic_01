<?php

namespace App\Repositories;

use App\Http\Requests\FavouriteRequest;
use App\Http\Requests\RateRequest;
use App\Models\Album;
use App\Models\Comment;
use App\Models\FavouriteList;
use App\Models\Song;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class FavouriteRepository
{
    public function addSong(FavouriteRequest $request)
    {
        $song_id = $request->song_id;
        $song = Song::find($song_id);
        $user = auth('web')->user();
        $favourite_list = $user->favouriteList;
        if(!isset($favourite_list)){
            $favourite_list = $this->createList();
        }

        try {
            $favourite_list->songs()->attach($song);
            return 0;
        } catch (\Throwable $th) {
        }
        return 1;
    }

    public function createList()
    {
        $user = User::loginWeb();
        $new_list = new FavouriteList();
        $new_list->name = $user->name;
        $user->favouriteList()->save($new_list);
        return $new_list;
    }

    public function removeSong(FavouriteRequest $request)
    {
        $user = User::loginWeb();
        try {
            $song = Song::find($request->song_id);
            $favourite_list = $user->favouriteList;
            $favourite_list->songs()->detach($song);
            return 0;
        } catch (\Throwable $th) {
        }
        return 1;
    }
}
