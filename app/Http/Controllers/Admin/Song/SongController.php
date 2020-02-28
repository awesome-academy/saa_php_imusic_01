<?php

namespace App\Http\Controllers\Admin\Song;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SongRequest;
use App\Models\Song;
use App\Repositories\AlbumRepository;
use App\Repositories\ArtistRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SongRepository;
use Illuminate\Support\Facades\Input;

class SongController extends Controller
{
    protected $songRepo, $albumRepo, $artistRepo, $categoryRepo;
    
    public function __construct(SongRepository $songRepo, AlbumRepository $albumRepo, ArtistRepository $artistRepo, CategoryRepository $categoryRepo) {
        $this->songRepo = $songRepo;
        $this->albumRepo = $albumRepo;
        $this->artistRepo = $artistRepo;
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::with('artists:id,name', 'albums:id,name', 'category:id,name')->get();
        return view('admin.song.index', [
            'songs' => $songs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = $this->albumRepo->getAll();
        $artists = $this->artistRepo->getAll();
        $categories = $this->categoryRepo->getAll();
        return view('admin.song.create', [
            'albums' => $albums,
            'artists' => $artists,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SongRequest $request)
    {
        $request->validated([
            'Song.link' => 'required|mimes:mp3|size:15000',
            'Song.image' => 'nullable|image|mimes:jpeg,png,jpg,gif|size:5000',
        ]);
        $result = $this->songRepo->store($request);
        if ($result) {
            return redirect()->route('admin.song.index')->with('success', trans('messages.add_song_success'));
        }
        return redirect()->back()->withInput(Input::all())->with('error', trans('messages.add_song_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        $song_artists = $song->artists()->pluck('id')->toArray();
        $song_albums = $song->albums()->pluck('id')->toArray();
        $albums = $this->albumRepo->getAll();
        $artists = $this->artistRepo->getAll();
        $categories = $this->categoryRepo->getAll();
        return view('admin.song.edit', [
            'song_artists' => $song_artists,
            'song_albums' => $song_albums,
            'albums' => $albums,
            'artists' => $artists,
            'categories' => $categories,
            'song' => $song
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SongRequest $request, Song $song)
    {
        $request->validated([
            'Song.link' => 'nullable|mimes:mp3|size:15000',
            'Song.image' => 'nullable|image|mimes:jpeg,png,jpg,gif|size:5000',
        ]);
        $result = $this->songRepo->update($request, $song);
        if ($result) {
            return redirect()->back()->with('success', trans('messages.update_song_success'));
        }
        return redirect()->back()->withInput(Input::all())->with('error', trans('messages.update_song_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $result = $this->songRepo->delete($song);
        if ($result) {
            return redirect()->back()->with('success', trans('messages.delete_song_success'));
        }
        return redirect()->back()->with('error', trans('messages.delete_song_fail'));
    }
}
