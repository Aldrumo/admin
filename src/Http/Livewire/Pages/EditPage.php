<?php

namespace Aldrumo\Admin\Http\Livewire\Pages;

use Livewire\Component;

class EditPage extends Component
{
    public $page;

    public $blocks = [];

    public $modalOpen = false;

    public function mount()
    {
        //
    }

    public function render()
    {
        return view('Admin::livewire.pages.edit-page');
    }

    public function toggleModel()
    {
        $this->modalOpen = ! $this->modalOpen;
    }

    public function savePage()
    {
        //
    }
}
