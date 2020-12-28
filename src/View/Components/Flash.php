<?php

namespace Aldrumo\Admin\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Flash extends Component
{
    /** @var string|null */
    public $prefix;

    public function __construct(?string $prefix = null)
    {
        $this->prefix = $prefix;
    }

    public function render(): View
    {
        return view(
            'Admin::components.flash',
            [
                'prefix' => $this->prefix ?? '',
            ]
        );
    }
}
