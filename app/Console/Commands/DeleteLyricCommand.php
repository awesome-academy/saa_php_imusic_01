<?php

namespace App\Console\Commands;

use App\Models\Lyric;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DeleteLyricCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lyric:delete_monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete lyric uncencored monthly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $start = new Carbon('first day of this month');
        Lyric::whereDate('created_at', '<', $start)
            ->whereStatus(Config::get('constants.status.Pending'))->delete();
    }
}
