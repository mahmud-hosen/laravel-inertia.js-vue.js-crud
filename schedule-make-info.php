
<?php

/***
Step-1: 
    $ php artisan make:command ScheduleRunEveryMinutes --command=schedule:every_minutes

    Details: $ php artisan make:command schedule_name --command=karnel_command_name

***/

//Step-2: update file:

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
    
/***
Step-3:
    $ php artisan schedule:run
***/
