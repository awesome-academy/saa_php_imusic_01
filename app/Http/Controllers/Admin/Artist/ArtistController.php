<?php

namespace App\Http\Controllers\Admin\Artist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtistRequest;
use App\Models\Artist;
use App\Repositories\ArtistRepository;
use Illuminate\Support\Facades\Input;

class ArtistController extends Controller
{
    protected $artistRepo;

    public function __construct(ArtistRepository $artistRepo) {
        $this->artistRepo = $artistRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = $this->artistRepo->getAll();
        return view('admin.artist.index', [
            'artists' => $artists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtistRequest $request)
    {
        $result = $this->artistRepo->store($request);
        if ($result) {
            return redirect()->route('admin.artist.index')->with('success', trans('messages.add_artist_success'));
        }
        return redirect()->back()->withInput(Input::all())->with('error', trans('messages.add_artist_fail'));
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
    public function edit(Artist $artist)
    {
        return view('admin.artist.edit', [
            'artist' => $artist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtistRequest $request, Artist $artist)
    {
        $result = $this->artistRepo->update($request, $artist);
        if ($result) {
            return redirect()->back()->with('success', trans('messages.update_artist_success'));
        }
        return redirect()->back()->withInput(Input::all())->with('error', trans('messages.update_artist_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        $result = $this->artistRepo->delete($artist);
        if ($result) {
            return redirect()->back()->with('success', trans('messages.delete_artist_success'));
        }
        return redirect()->back()->with('error', trans('messages.delete_artist_fail'));
    }
}
