<?php

namespace Asciito\LaravelModelStatus\Tests;

use Asciito\LaravelModelStatus\ModelStatusServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            ModelStatusServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        (require __DIR__.'/../workbench/database/migrations/create_models_table.php')->up();

        (require __DIR__.'/../workbench/database/migrations/create_constant_status_column_models_table.php')->up();
    }
}
