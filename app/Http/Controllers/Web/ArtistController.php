<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        return view('web.artist.index', [
            'artists' => $artists
        ]);
    }

    public function songs(Artist $artist)
    {
        $songs = $artist->songs;
        return view('web.artist.list_song', [
            'songs' => $songs,
            'artist' => $artist
        ]);
    }
}
