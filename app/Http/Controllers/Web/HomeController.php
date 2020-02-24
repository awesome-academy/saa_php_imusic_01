<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;

class HomeController extends Controller
{
    public function index()
    {
        $top_20_songs = Song::orderBy('count', 'DESC')->take(20)->with('artists:id,name')->get();
        $new_release_songs = Song::where('is_new', true)->take(8)->get();
        $artists = Artist::take(12)->get();
        return view('web.index', [
            'top_20_songs' => $top_20_songs,
            'new_release_songs' => $new_release_songs,
            'artists' => $artists,
        ]);
    }

    public function search(Request $request)
    {
        $key = $request->search;
        $songs = Song::where('title', 'like', "%$key%")->get();
        $artists = Artist::where('name', 'like', "%$key%")->get();
        $albums = Album::where('name', 'like', "%$key%")->get();
        return view('web.search', [
            'songs' => $songs,
            'artists' => $artists,
            'albums' => $albums,
        ]);
    }
}
