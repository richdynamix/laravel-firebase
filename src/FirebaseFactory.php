<?php

namespace Richdynamix\LaravelFirebase;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseFactory
{
    public static function create(ServiceAccount $serviceAccount, array $config)
    {
        return (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri($config['database_uri'])
            ->create();
    }
}
