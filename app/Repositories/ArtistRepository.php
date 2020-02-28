<?php

namespace App\Repositories;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\Artist;
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
}
