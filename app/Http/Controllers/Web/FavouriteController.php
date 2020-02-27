<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavouriteRequest;
use App\Repositories\FavouriteRepository;
use App\User;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    protected $favouriteRepo;
    public function __construct(FavouriteRepository $favouriteRepo)
    {
        $this->favouriteRepo = $favouriteRepo;
    }

    public function index()
    {
        $user = User::loginWeb();
        $my_farourite = $user->favouriteList;
        $songs = isset($my_farourite) ? $my_farourite->songs : [];
        return view('web.favourite.show', [
            'songs' => $songs
        ]);
    }

    public function add(FavouriteRequest $request)
    {
        $result = $this->favouriteRepo->addSong($request);
        if ($result == 0) {
            return response()->json([
                'success' => true,
                'message' => trans('messages.add_favourite_song_success'),
                'data' => ''
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => trans('messages.add_favourite_song_fail'),
            'data' => ''
        ]);
    }

    public function delete(FavouriteRequest $request)
    {
        $result = $this->favouriteRepo->removeSong($request);
        if ($result == 0) {
            return response()->json([
                'success' => true,
                'message' => trans('messages.success'),
                'data' => ''
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => trans('messages.fail'),
            'data' => ''
        ]);
    }
}
