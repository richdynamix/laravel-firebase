<?php

namespace Richdynamix\LaravelFirebase;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Richdynamix\LaravelFirebase\Skeleton\SkeletonClass
 */
class Firebase extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return FirebaseFactory::class;
    }
}
