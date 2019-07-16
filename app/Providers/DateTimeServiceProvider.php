<?php

namespace App\Providers;

use App\Facades\DateTime\DateTimeHelper;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class DateTimeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('datetime', function() {
            return new DateTimeHelper();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
