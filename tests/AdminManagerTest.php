<?php

namespace Aldrumo\Admin\Tests;

use Aldrumo\Admin\Contracts\AdminManager;
use Illuminate\Support\Collection;

class AdminManagerTest extends TestCase
{
    /** @test */
    public function can_get_menu_collection()
    {
        $this->assertInstanceOf(
            Collection::class,
            $this->app[AdminManager::class]->menu()
        );
    }
}
