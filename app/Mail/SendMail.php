<?php
namespace App\Mail;

use App\Mail\UserEmail;
use App\Models\Song;
use App\User;
use Illuminate\Support\Facades\Mail;

class SendMail
{
    public function sendMail(User $user)
    {
        Mail::to($user)->send(new UserEmail($user));
    }

    public function sendSongInform(User $user, Song $song)
    {
        Mail::to($user)->send(new SongInform($song));
    }
}
