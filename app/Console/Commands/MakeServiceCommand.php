<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class MakeServiceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';
    protected $type = 'Service';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    protected function getStub(): string
    {
        return __DIR__.'/../../../stubs/service.stubs';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace. '\Services';
    }
}
