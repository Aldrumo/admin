<?php

namespace Aldrumo\Admin\Tests;

use Aldrumo\Admin\Providers\AdminServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            AdminServiceProvider::class,
            LivewireServiceProvider::class,
        ];
    }
}
