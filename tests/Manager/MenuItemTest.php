<?php

namespace Aldrumo\Admin\Tests\Manager;

use Aldrumo\Admin\Manager\MenuItem;
use Aldrumo\Admin\Tests\TestCase;

class MenuItemTest extends TestCase
{
    /** @test */
    public function can_make_menu_item()
    {
        $menuItem = MenuItem::make('Pages', 'admin.pages.index');

        $this->assertInstanceOf(
            MenuItem::class,
            $menuItem
        );

        $this->assertSame(
            'Pages',
            $menuItem->text
        );

        $this->assertSame(
            'admin.pages.index',
            $menuItem->route
        );

        $this->assertSame(
            0,
            $menuItem->order
        );
    }
}
