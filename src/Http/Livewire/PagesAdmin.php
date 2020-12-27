<?php

namespace Aldrumo\Admin\Http\Livewire;

use Aldrumo\Core\Models\Page;
use Livewire\Component;

class PagesAdmin extends Component
{
    public $pages;

    protected $listeners = [
        'pageCreated' => 'loadPages',
        'pageSaved'
    ];

    public function mount()
    {
        $this->loadPages();
    }

    public function loadPages()
    {
        $this->pages = Page::orderBy('title', 'asc')->get();
    }

    public function pageSaved()
    {
        $this->loadPages();

        session()->flash(
            'success',
            __('Page has been saved successfully.')
        );
    }

    public function render()
    {
        return view('Admin::livewire.pages-admin');
    }
}
