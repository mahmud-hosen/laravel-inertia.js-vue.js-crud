<?php

namespace App\Services;


class NotificationService
{
    public function notification_sent($to, $subject, $message)
    {
        return "Notification sent to $to with subject '$subject'.";
    }

    public function notification_count($value1, $value2)
    {
        return "Notification Count : ".$value1 + $value2;
    }
}

