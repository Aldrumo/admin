<?php

namespace Aldrumo\Admin\Tests\Providers;

use Aldrumo\Admin\AdminManager;
use Aldrumo\Admin\Providers\AdminServiceProvider;
use Aldrumo\Core\Providers\FortifyServiceProvider;
use Aldrumo\Core\Providers\JetstreamServiceProvider;
use Aldrumo\Core\Tests\TestCase;

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
            $this->app[\Aldrumo\Admin\Contracts\AdminManager::class
        );
    }
}
