<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rate;
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
        $user = auth('web')->user();
        $user_rates = $rating->where('user_id', '=', $user->id);
        $user_rate = count($user_rates) > 0 ? $user_rates->first() : null;
        $favourite_status = $this->songRepo->isFavourite($user, $song);
        $this->songRepo->addView($song);
        return view('web.single', [
            'song' => $song,
            'rating' => $rating,
            'comments' => $comments,
            'user_rate' => $user_rate,
            'favourite_status' => $favourite_status,
        ]);
    }
}
