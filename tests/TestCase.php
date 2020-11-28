<?php

namespace Aldrumo\Admin\Tests;

use Aldrumo\Admin\Providers\AdminServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            AdminServiceProvider::class,
        ];
    }
}
