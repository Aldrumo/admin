<?php

namespace Aldrumo\Admin\Contracts;

use Illuminate\Support\Collection;

interface AdminManager
{
    public function menu(): Collection;
}
