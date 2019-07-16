<?php


namespace App\Facades\DateTime;

use Carbon\Carbon;

class DateTimeHelper
{
    public function createDateTime($date, $time)
    {
        try {
            $dateTime = new Carbon($date);
            $time = explode(':', $time);
            $dateTime->setTime($time[0], $time[1]);
        } catch (\Exception $e) {
            //
        }

        return $dateTime;
    }
}
