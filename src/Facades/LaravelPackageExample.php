<?php

namespace KrisOzolins\LaravelPackageExample\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelPackageExample extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelpackageexample';
    }
}
