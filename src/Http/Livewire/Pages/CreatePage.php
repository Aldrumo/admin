<?php

namespace Aldrumo\Admin\Http\Livewire\Pages;

use Aldrumo\Core\Models\Page;
use Livewire\Component;

class CreatePage extends Component
{
    public $modalOpen = false;

    public $page = [
        'title' => '',
        'template' => '',
    ];

    public function mount()
    {
        //
    }

    public function render()
    {
        return view('Admin::livewire.pages.create-page');
    }

    public function toggleModel()
    {
        $this->modalOpen = ! $this->modalOpen;
    }
}
