<?php

namespace Korzechowski\RestApi;

use Illuminate\Support\ServiceProvider;

class RestApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPublishables();
    }

    private function registerPublishables()
    {
        $basePath = dirname(__DIR__);

        $publishables = [
            "migrations" => [
                "${basePath}\src\publishable\database\migrations" => database_path("migrations")
            ],
            "seeders" => [
                "${basePath}\src\publishable\database\seeds" => database_path("seeds")
            ]
        ];

        foreach ($publishables as $group => $paths) {
            $this->publishes($paths, $group);
        }
    }
}
