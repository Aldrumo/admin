<?php

namespace Aldrumo\Admin\Http\Livewire;

use Aldrumo\Core\Models\Page;
use Livewire\Component;

class PagesAdmin extends Component
{
    public $pages;

    protected $listeners = [
        'pageCreated',
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

    public function pageCreated(int $pageId)
    {
        $this->loadPages();

        $this->emitTo('edit-page', 'newPage', $pageId);
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
