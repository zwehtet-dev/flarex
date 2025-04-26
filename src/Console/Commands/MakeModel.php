<?php

namespace FlareX\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeModel extends Command {
    protected $signature = 'flarex:make:model {name}';

    protected $description = 'Create a new Eloquent model';

    public function handle() {
        $name = $this->argument( 'name' );
        $stub = File::get( config( 'flarex.stubs.model' ) );
        $stub = str_replace( '{{ class }}', $name, $stub );
        $stub = str_replace( '{{ namespace }}', config( 'flarex.namespace' ).'\Models', $stub );

        $path = base_path( config( 'flarex.paths.models' )."/{$name}.php" );
        File::put( $path, $stub );

        $this->info( "Model {$name} created successfully at {$path}." );
    }
}