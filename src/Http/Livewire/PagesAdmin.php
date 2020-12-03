<?php

namespace Aldrumo\Admin\Http\Livewire;

use Aldrumo\Core\Models\Page;
use Livewire\Component;

class PagesAdmin extends Component
{
    public $pages;

    public function mount()
    {
        $this->pages = Page::orderBy('title', 'asc')->get();
    }

    public function render()
    {
        return view('Admin::livewire.pages-admin');
    }
}
