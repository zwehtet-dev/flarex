<?php

namespace FlareX;

use Illuminate\Support\ServiceProvider;

class FlareXServiceProvider extends ServiceProvider {
    public function register() {
        // Register bindings or configurations
    }

    public function boot() {
        if ( $this->app->runningInConsole() ) {
            $this->commands( [
                \FlareX\Console\Commands\Generate::class,
                \FlareX\Console\Commands\MakeModel::class,
                \FlareX\Console\Commands\MakeController::class,
                \FlareX\Console\Commands\MakeApi::class,
                \FlareX\Console\Commands\MakeResource::class,
                \FlareX\Console\Commands\MakeModule::class,
            ] );
        }

        // Publish configuration file
        $this->publishes( [
            __DIR__.'/../config/flarex.php' => config_path( 'flarex.php' ),
        ], 'config' );
    }
}