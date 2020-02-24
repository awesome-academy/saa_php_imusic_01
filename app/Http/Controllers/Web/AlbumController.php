<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('web.album.index', [
            'albums' => $albums
        ]);
    }

    public function songs(Album $album){
        $songs = $album->songs()->with('artists:id,name')->get();
        return view('web.album.list_song', [
            'songs' => $songs,
            'album' => $album
        ]);
    }
}
