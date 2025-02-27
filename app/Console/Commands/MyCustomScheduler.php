<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;


class MyCustomScheduler extends Command
{

    protected $signature = 'MyCustomScheduler';
    protected $description = 'This scheduler runs every two minutes';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        // Add your task logic here

        Log::channel('schedule_log')->info('Schedule ran at:' . now());
        
    }
}