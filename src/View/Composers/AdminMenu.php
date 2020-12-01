<?php

namespace Aldrumo\Admin\View\Composers;

use Aldrumo\Admin\Contracts\AdminManager;
use Illuminate\View\View;

class AdminMenu
{
    /** @var AdminManager */
    protected $adminManager;

    public function __construct(AdminManager $adminManager)
    {
        $this->adminManager = $adminManager;
    }

    public function compose(View $view)
    {
        $view->with(
            'adminMenu',
            $this->adminManager
                ->menu()
                ->sortBy('order')
        );
    }
}
