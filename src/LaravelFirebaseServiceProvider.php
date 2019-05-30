<?php

namespace Richdynamix\LaravelFirebase;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\ServiceAccount;
use Richdynamix\LaravelFirebase\Exceptions\InvalidConfig;

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

        $this->app->singleton(FirebaseFactory::class, function () {
            $config = config('firebase');
            $this->guardAgainstInvalidConfiguration($config);

            $serviceAccount = ServiceAccount::fromJsonFile(
                $config['service_account_json']
            );

            return FirebaseFactory::create($serviceAccount, $config);
        });
    }

    /**
     * @param  array|null  $config
     *
     * @throws InvalidConfig
     */
    protected function guardAgainstInvalidConfiguration(array $config = null)
    {
        if (!file_exists($config['service_account_json'])) {
            throw InvalidConfig::credentialsJsonMissing(
                $config['service_account_json']
            );
        }
    }
}
