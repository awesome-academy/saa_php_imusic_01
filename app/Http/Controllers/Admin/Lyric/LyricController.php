<?php

namespace App\Http\Controllers\Admin\Lyric;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LyricRequest;
use App\Models\Lyric;
use App\Models\Song;
use App\Repositories\LyricRepository;
use Illuminate\Support\Facades\Input;

class LyricController extends Controller
{
    protected $lyricRepo;

    public function __construct(LyricRepository $lyricRepo) {
        $this->lyricRepo = $lyricRepo;
    }

    public function index()
    {
        // $lyrics = $this->lyricRepo->getAll();
        $lyrics = Lyric::with('song:id,title', 'user:id,email')->get();
        return view('admin.lyric.index', [
            'lyrics' => $lyrics
        ]);
    }

    public function edit(Lyric $lyric)
    {
        return view('admin.lyric.edit', [
            'lyric' => $lyric
        ]);
    }

    public function update(LyricRequest $request, Lyric $lyric)
    {
        $result = $this->lyricRepo->updateStatus($request, $lyric);
        if ($result) {
            return redirect()->back()->with('success', trans('messages.update_lyric_success'));
        }
        return redirect()->back()->withInput(Input::all())->with('error', trans('messages.update_lyric_fail'));
    }
}
