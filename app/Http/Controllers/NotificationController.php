<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NotificationService;


class NotificationController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function sent(){

        $to = "example@example.com";
        $subject = "Welcome to Dependency Injection";
        $message = "This is an example of DI in Laravel.";

        return $this->notificationService->notification_sent($to, $subject, $message);
    }

    public function count(){

        $value1 = 5;
        $value2 = 7;

        return $this->notificationService->notification_count($value1, $value2);

    }

    public function verify(){
        dd("verify");
    }
}
