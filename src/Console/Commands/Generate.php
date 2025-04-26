<?php

namespace FlareX\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Style\SymfonyStyle;

class Generate extends Command {
    protected $signature = 'flarex:generate {name}';

    protected $description = 'Generate a complete feature set';

    public function handle() {
        $io = new SymfonyStyle( $this->input, $this->output );
        $name = $this->argument( 'name' );

        $io->progressStart( 3 );
        // For model, controller, API

        $this->call( 'flarex:make:model', [ 'name' => $name ] );
        $io->progressAdvance();

        $this->call( 'flarex:make:controller', [ 'name' => $name ] );
        $io->progressAdvance();

        $this->call( 'flarex:make:api', [ 'name' => $name ] );
        $io->progressAdvance();

        $io->progressFinish();
        $io->success( "Feature {$name} generated successfully." );
    }
}