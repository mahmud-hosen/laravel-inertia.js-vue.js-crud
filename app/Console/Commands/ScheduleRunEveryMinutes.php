<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ScheduleRunEveryMinutes extends Command
{

    protected $signature = 'schedule:every_minutes';
    protected $description = 'Command description';


    public function handle()
    {
        Log::channel('schedule_every_minutes_log')->info('Schedule every minutes:' . now());

    }
}
