<?php

namespace Tonystore\LaravelValidateEc\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Tonystore\LaravelValidateEc\LaravelValidateEcProvider;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelValidateEcProvider::class,
        ];
    }
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.locale', 'es');
    }
}
