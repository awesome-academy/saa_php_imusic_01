<?php

namespace App\Repositories;

use App\Http\Requests\SongRequest;
use App\Jobs\SendInformNewSongEmail;
use App\Mail\SendMail;
use App\Mail\SongInform;
use App\Models\Comment;
use App\Models\Song;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SongRepository
{
    protected $fileRepo;

    public function __construct(FileRepository $fileRepo)
    {
        $this->fileRepo = $fileRepo;
    }

    public function getAll()
    {
        return Song::orderBy('created_at', 'DESC')->get();
    }

    public function addView(Song $song)
    {
        $song->count = $song->count + 1;
        $song->save();
    }

    public function isFavourite(User $user, Song $song)
    {
        $favourite_list = $user->favouriteList;
        if ($favourite_list) {
            return $favourite_list->songs()->where('song_id', $song->id)->count();
        }
        return 0;
    }

    public function store(SongRequest $request)
    {
        $song = new Song();
        $song->title = $request->Song['title'];
        $song->category_id = $request->Song['category_id'];
        $song->is_new = isset($request->Song['is_new']) ? true : false;
        if (isset($request->Song['image'])) {
            $file_image = $request->Song['image'];
            $image = $this->fileRepo->uploadFile($file_image, Config::get('constants.storage.image'));
        } else {
            $image = Config::get('constants.song.default_image');
        }
       
        if ($image != null) {
            $song->image = $image;
        }

        $file_song = $request->Song['link'];
        $link = $this->fileRepo->uploadFile($file_song, Config::get('constants.storage.song'));
        if ($link != null) {
            $song->link = $link;
        } else {
            return false;
        }

        $albums = $request->albums;
        $artists = $request->artists;
        try {
            DB::transaction(function () use ($song, $albums, $artists) {
                $song->save();
                $song->albums()->attach($albums);
                $song->artists()->attach($artists);
                $this->createQueue($song);
            });
            return true;
        } catch (\Throwable $th) {
        }
        return false;
    }

    public function update(SongRequest $request, Song $song)
    {
        $song->title = $request->Song['title'];
        $song->category_id = $request->Song['category_id'];
        $song->is_new = isset($request->Song['is_new']) ? true : false;
        $file_image = isset($request->Song['image']) ? $request->Song['image'] : null;
        $image = $this->fileRepo->uploadFile($file_image, Config::get('constants.storage.image'));
        if ($image != null) {
            $song->image = $image;
        }

        $file_song = isset($request->Song['link']) ? $request->Song['link'] : null;
        $link = $this->fileRepo->uploadFile($file_song, Config::get('constants.storage.song'));
        if ($link != null) {
            $song->link = $link;
        }

        $albums = $request->albums;
        $artists = $request->artists;
        try {
            DB::transaction(function () use ($song, $albums, $artists) {
                $song->save();
                $song->albums()->sync($albums);
                $song->artists()->sync($artists);
            });
            return true;
        } catch (\Throwable $th) {
        }
        return false;
    }

    public function delete(Song $song)
    {
        try {
            DB::transaction(function () use ($song) {
                $song->albums()->detach();
                $song->artists()->detach();
                $song->rates()->delete();
                $song->lyrics()->delete();
                $song->comments()->delete();
                $song->delete();
            });
            return true;
        } catch (\Throwable $th) {
            //throw $th;
        }
        return false;
    }

    public function createQueue(Song $song)
    {
        $users = User::all();
        $second = 0;
        foreach ($users as $user) {
            $second += 15;
            $emailJob = (new SendInformNewSongEmail($user, $song))->delay(Carbon::now()->addSeconds($second));
            dispatch($emailJob);
        }
    }
}
