<?php

namespace Nuwave\Lighthouse\Support\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class DataFetcherMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'lighthouse:datafetcher';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a GraphQL DataFetcher.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'DataFetcher';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/datafetcher.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return config('lighthouse.namespaces.datafetchers') ?: config('lighthouse.namespaces.dataloaders');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);

        return str_replace('DummyClass', $class, $stub);
    }
}
