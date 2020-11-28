<?php

namespace Aldrumo\Admin\Tests\Providers;

use Aldrumo\Admin\AdminManager;
use Aldrumo\Admin\Contracts\AdminManager as AdminManagerContract;
use Aldrumo\Admin\Providers\AdminServiceProvider;
use Aldrumo\Admin\Tests\TestCase;

class AdminServiceProviderTest extends TestCase
{
    /** @test */
    public function has_service_provider_loaded()
    {
        $this->assertTrue(
            $this->app->providerIsLoaded(AdminServiceProvider::class)
        );
    }

    /** @test */
    public function has_admin_manager_registered()
    {
        $this->assertInstanceOf(
            AdminManager::class,
            $this->app[AdminManagerContract::class]
        );
    }
}
