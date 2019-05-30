<?php

namespace Richdynamix\LaravelFirebase;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Factory;
use Richdynamix\LaravelFirebase\Exceptions\InvalidConfiguration;

class LaravelFirebaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('firebase.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'firebase');

        $this->app->singleton('laravel-firebase', function () {
            $firebaseConfig = config('firebase');
            $this->guardAgainstInvalidConfiguration($firebaseConfig);

            $serviceAccount = ServiceAccount::fromJsonFile(
                $firebaseConfig['service_account_json']
            );

            return (new Factory)
                ->withServiceAccount($serviceAccount)
                ->withDatabaseUri($firebaseConfig['database_uri'])
                ->create();
        });
    }

    /**
     * @param  array|null  $firebaseConfig
     *
     * @throws InvalidConfiguration
     */
    protected function guardAgainstInvalidConfiguration(array $firebaseConfig = null)
    {
        if (!file_exists($firebaseConfig['service_account_json'])) {
            throw InvalidConfiguration::credentialsJsonDoesNotExist($firebaseConfig['service_account_json']);
        }
    }
}
