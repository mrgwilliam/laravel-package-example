<?php

namespace KrisOzolins\LaravelPackageExample\Exceptions;

use Exception;

class InvalidConfiguration extends Exception
{
    // This is an example.
    // Adapt this to yur config validation checks!
    public static function versionNotSpecified()
    {
        return new static('EXAMPLE: You must provide a valid version.');
    }
}
