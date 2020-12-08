<?php

namespace Aldrumo\Admin\Http\Livewire\Pages;

use Aldrumo\Core\Models\Page;
use Livewire\Component;

class CreatePage extends Component
{
    public $modelOpen = false;

    public function mount()
    {
        //
    }

    public function render()
    {
        if ($this->modelOpen) {
            return view('Admin::livewire.pages.create-page-modal');
        }

        return view('Admin::livewire.pages.create-page');
    }

    public function toggleModel()
    {
        $this->modelOpen = ! $this->modelOpen;
    }
}
