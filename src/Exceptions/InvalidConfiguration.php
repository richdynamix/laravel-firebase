<?php

namespace Richdynamix\LaravelFirebase\Exceptions;

use Exception;

class InvalidConfiguration extends Exception
{
    /**
     * @param  string  $path
     *
     * @return InvalidConfiguration
     */
    public static function credentialsJsonDoesNotExist(string $path)
    {
        return new static(
            "Could not find a credentials file at `{$path}`."
        );
    }
}
