<?php

namespace Nuwave\Lighthouse\Tests\Console;

use Nuwave\Lighthouse\Tests\TestCase;

class SchemaGeneratorTest extends TestCase
{
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('lighthouse.schema.output', __DIR__.'/../Support/storage/schema/schema.json');
    }

    /**
     * Resolve application Console Kernel implementation.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function resolveApplicationConsoleKernel($app)
    {
        $app->singleton('Illuminate\Contracts\Console\Kernel', 'Nuwave\Lighthouse\Tests\Support\Console\Kernel');
    }

    /**
     * @test
     */
    public function itGeneratesSchemaFile()
    {
        $this->artisan('lighthouse:schema');
    }
}
