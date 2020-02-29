<?php

namespace App\Jobs;

use App\Mail\SendMail;
use App\Mail\UserEmail;
use App\Models\Song;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendInformNewSongEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user, $song;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Song $song)
    {
        $this->user = $user;
        $this->song = $song;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $send_mail = new SendMail();
        $send_mail->sendSongInform($this->user, $this->song);
    }
}
