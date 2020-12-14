<?php

namespace Aldrumo\Admin\Http\Livewire\Pages;

use Livewire\Component;

class EditPage extends Component
{
    public $page;

    public $modalOpen = false;

    public function mount()
    {
        //
    }

    public function render()
    {
        return view('Admin::livewire.pages.edit-page');
    }
}
