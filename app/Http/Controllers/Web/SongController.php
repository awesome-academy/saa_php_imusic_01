<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Song;
use App\Repositories\SongRepository;

class SongController extends Controller
{

    protected $songRepo;

    public function __construct(SongRepository $songRepo)
    {
        $this->songRepo = $songRepo;
    }

    public function listen(Song $song)
    {
        $comments = $song->comments()->with('user:id,name,avatar')->get();
        $rating = $song->rates;
        $this->songRepo->addView($song);
        return view('web.single', [
            'song' => $song,
            'rating' => $rating,
            'comments' => $comments,
        ]);
    }
}
