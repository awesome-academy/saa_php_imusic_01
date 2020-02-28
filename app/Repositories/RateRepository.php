<?php

namespace App\Repositories;

use App\Http\Requests\RateRequest;
use App\Models\Album;
use App\Models\Comment;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class RateRepository
{
    public function store(RateRequest $request)
    {
        $user = auth('web')->user();
        $rate = [
            'point' => $request->point,
            'user_id' => $user->id
        ];
        switch ($request->rateable_type) {
            case Config::get('constants.song.rateable_type'):
                $rateable = Song::find($request->rateable_id);
                $results = $rateable->rates()->where('user_id', $user->id)->get();
                if (count($results)) {
                    $result = $results->first();
                    $result->point = $rate['point'];
                    $result->save();
                } else {
                    $result = $rateable->rates()->create($rate);
                }
                $this->updateScoreSong($rateable);
                break;
            default:
                # code...
                break;
        }
        return $result;
    }

    public function updateScoreSong(Song $song)
    {
        $song->score = $song->rates()->avg('point');
        $song->save();
    }
}
