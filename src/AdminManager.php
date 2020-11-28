<?php

namespace Aldrumo\Admin;

use Contracts\AdminManager as AdminContract;
use Illuminate\Support\Collection;

class AdminManager implements AdminContract
{
    /** @var Collection */
    protected $menu;

    public function __construct(Collection $menu)
    {
        $this->menu = $menu;
    }

    public function menu(): Collection
    {
        return $this->menu;
    }
}
