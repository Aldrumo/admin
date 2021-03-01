<?php

namespace Aldrumo\Admin\Http\Livewire\Pages;

use Aldrumo\Core\Models\Page;
use Aldrumo\RouteLoader\Generator;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditPageTitle extends Component
{
    public $edit = false;

    public $title;

    public function render()
    {
        return view('Admin::livewire.pages.edit-page-title');
    }

    public function toggleEdit()
    {
        $this->edit = !$this->edit;
    }
}
