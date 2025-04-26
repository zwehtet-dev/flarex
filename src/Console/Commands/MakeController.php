<?php

namespace FlareX\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeController extends Command {
    protected $signature = 'flarex:make:controller {name}';

    protected $description = 'Create a new controller';

    public function handle() {
        $name = $this->argument( 'name' );
        $stub = File::get( config( 'flarex.stubs.controller' ) );
        $stub = str_replace( '{{ class }}', $name.'Controller', $stub );
        $stub = str_replace( '{{ namespace }}', config( 'flarex.namespace' ).'\Http\Controllers', $stub );
        $stub = str_replace( '{{ model }}', $name, $stub );

        $path = base_path( config( 'flarex.paths.controllers' )."/{$name}Controller.php" );
        File::put( $path, $stub );

        $this->info( "Controller {$name}Controller created successfully at {$path}." );
    }
}