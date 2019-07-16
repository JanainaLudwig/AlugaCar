<?php


namespace App\Facades\DateTime;


use Illuminate\Support\Facades\Facade;

class DateTime extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'datetime';
    }
}
