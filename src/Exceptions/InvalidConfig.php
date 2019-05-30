<?php

namespace Richdynamix\LaravelFirebase\Exceptions;

use Exception;

class InvalidConfig extends Exception
{
    /**
     * @param  string  $path
     *
     * @return InvalidConfig
     */
    public static function credentialsJsonMissing(string $path)
    {
        return new static(
            "Could not find a credentials file at `{$path}`."
        );
    }
}
