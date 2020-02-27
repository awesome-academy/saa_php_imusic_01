<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\User;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('web.album.index', [
            'albums' => $albums
        ]);
    }

    public function songs(Album $album)
    {
        $songs = $album->songs()->with('artists:id,name')->get();
        $comments = $album->comments()->with('user:id,name,avatar')->get();
        $favouriteList = User::loginWeb()->favouriteList()->with('songs:id')->first();
        if ($favouriteList) {
            $favourite_songs = $favouriteList->songs->pluck('id')->toArray();
        } else {
            $favourite_songs = [];
        }
        return view('web.album.list_song', [
            'songs' => $songs,
            'album' => $album,
            'comments' => $comments,
            'favourite_songs' => $favourite_songs
        ]);
    }
}
