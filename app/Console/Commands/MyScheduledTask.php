<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MyScheduledTask extends Command
{
    protected $signature = 'task:my-scheduled-task';
    protected $description = 'This command runs my scheduled task';

    public function handle()
    {
        // Your task logic here
        Log::channel('schedule_log')->info('Job ran at:' . now());

    }
}
