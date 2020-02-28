<?php

namespace App\Repositories;

use App\Http\Requests\AlbumRequest;
use App\Http\Requests\ArtistRequest;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ArtistRepository
{

    protected $fileRepo;

    public function __construct(FileRepository $fileRepo)
    {
        $this->fileRepo = $fileRepo;
    }

    public function getAll()
    {
        return Artist::orderBy('created_at', 'DESC')->get();
    }

    public function store(ArtistRequest $request)
    {
        $artist = new Artist();
        $artist->name = $request->Artist['name'];
        $artist->dob = date('y/m/d', strtotime($request->Artist['dob']));
        $artist->infomation = $request->Artist['information'];
        if (isset($request->Artist['avatar'])) {
            $file = $request->Artist['avatar'];
            $avatar = $this->fileRepo->uploadFile($file, Config::get('constants.storage.image'));
        } else {
            $avatar = Config::get('constants.artist.default_image');
        }
        $artist->avatar = $avatar;
        try {
            $artist->save();
            return true;
        } catch (\Throwable $th) {
        }
        return false;
    }

    public function update(ArtistRequest $request, Artist $artist)
    {
        $artist->name = $request->Artist['name'];
        $artist->dob = date('y/m/d', strtotime($request->Artist['dob']));
        $artist->infomation = $request->Artist['information'];
        if (isset($request->Artist['avatar'])) {
            $file = $request->Artist['avatar'];
            $avatar = $this->fileRepo->uploadFile($file, Config::get('constants.storage.image'));
            $artist->avatar = $avatar;
        } 
        try {
            $artist->save();
            return true;
        } catch (\Throwable $th) {
        }
        return false;
    }

    public function delete(Artist $artist)
    {
        $count_songs = $artist->songs()->count();
        if ($count_songs == 0) {
            try {
                $artist->delete();
                return true;
            } catch (\Throwable $th) {
            }
        }
        return false;
    }
}
