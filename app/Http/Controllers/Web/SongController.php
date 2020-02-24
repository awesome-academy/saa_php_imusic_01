<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Song;

class SongController extends Controller
{
    public function listen(Song $song)
    {
        $comments = $song->comments()->with('use:id,name')->get();
        $rating = $song->rates;
        return view('web.single', [
            'song' => $song,
            'rating' => $rating,
            'comments' => $comments
        ]);
    }
}
