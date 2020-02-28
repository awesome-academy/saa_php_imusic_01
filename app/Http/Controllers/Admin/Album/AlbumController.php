<?php

namespace App\Http\Controllers\Admin\Album;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Repositories\AlbumRepository;

class AlbumController extends Controller
{
    protected $albumRepo;

    public function __construct(AlbumRepository $albumRepo) {
        $this->albumRepo = $albumRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = $this->albumRepo->getAll();
        return view('admin.album.index', [
            'albums' => $albums
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        $request->validate([
            'Album.image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);
        $result = $this->albumRepo->store($request);
        if ($result) {
            return redirect()->route('admin.album.index')->with('success', trans('messages.add_album_success'));
        }
        return redirect()->back()->with('error', trans('messages.add_album_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('admin.album.edit', [
            'album' => $album
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumRequest $request, Album $album)
    {
        $result = $this->albumRepo->update($request, $album);
        if ($result) {
            return redirect()->back()->with('success', trans('messages.update_album_success'));
        }
        return redirect()->back()->with('error', trans('messages.update_album_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $result = $this->albumRepo->delete($album);
        if ($result) {
            return redirect()->route('admin.album.index')->with('success', trans('messages.delete_album_success'));
        }
        return redirect()->route('admin.album.index')->with('error', trans('messages.delete_album_fail'));
    }
}
