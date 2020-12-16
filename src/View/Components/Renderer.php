<?php

namespace Aldrumo\Admin\View\Components;

use Illuminate\View\Component;

class Renderer extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view(
            'Admin::components.renderer',
            [
                'inEditor' => resolve('inEditor') ?? false,
            ]
        );
    }
}
