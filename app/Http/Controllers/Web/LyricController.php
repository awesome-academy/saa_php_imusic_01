<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LyricRequest;
use App\Models\Lyric;
use App\Models\Song;
use App\Repositories\LyricRepository;
use App\User;

class LyricController extends Controller
{
    protected $lyricRepo;

    public function __construct(LyricRepository $lyricRepo)
    {
        $this->lyricRepo = $lyricRepo;
    }

    public function create(LyricRequest $request)
    {
        $result = $this->lyricRepo->store($request);
        if ($result == 0) {
            return redirect()->back()->with('status', trans('messages.add_lyric_success'));
        }
        return redirect()->back()->with('status', trans('messages.add_lyric_fail'));
    }

    public function update(LyricRequest $request, Lyric $lyric)
    {
        $result = $this->lyricRepo->update($request, $lyric);
        if ($result == 0) {
            return redirect()->back()->with('status', trans('messages.update_lyric_success'));
        }
        return redirect()->back()->with('status', trans('messages.update_lyric_fail'));
    }

    public function delete(Lyric $lyric)
    {
        $result = $this->lyricRepo->delete($lyric);
        if ($result == 0) {
            return redirect()->back()->with('status', trans('messages.delete_lyric_success'));
        }
        return redirect()->back()->with('status', trans('messages.delete_lyric_fail'));
    }
}
