<?php

namespace App\Repositories;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\Comment;
use App\Models\Song;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class AlbumRepository
{

    protected $fileRepo;

    public function __construct(FileRepository $fileRepo)
    {
        $this->fileRepo = $fileRepo;
    }

    public function getAll()
    {
        return Album::orderBy('created_at', 'DESC')->get();
    }

    public function store(AlbumRequest $request)
    {
        $album = new Album([
            'name' => $request->Album['title'],
            'is_hot' => isset($request->Album['is_hot']) ? true : false,
        ]);
        $file = $request->Album['image'];
        $name = $this->fileRepo->uploadFile($file);
        if ($name != null) {
            $album->image = $name;
            try {
                $album->save();
                return true;
            } catch (\Throwable $th) {
            }
        }
        return false;
    }

    public function update(AlbumRequest $request, Album $album)
    {
        $album->name = $request->Album['title'];
        $album->is_hot = isset($request->Album['is_hot']) ? true : false;
        if (isset($request->Album['image'])) {
            $file = $request->Album['image'];
            $name = $this->fileRepo->uploadFile($file);
            if ($name != null) {
                $album->image = $name;
            } else {
                return false;
            }
        }
        try {
            $album->save();
            return true;
        } catch (\Throwable $th) {
        }
        return false;
    }

    public function delete(Album $album)
    {
        try {
            DB::transaction(function () use ($album) {
                $album->songs()->detach();
                $album->delete();
            });
            return true;
        } catch (\Throwable $th) {
            //throw $th;
        }
        return false;
    }
}
