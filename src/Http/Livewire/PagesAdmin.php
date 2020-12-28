<?php

namespace Aldrumo\Admin\Http\Livewire;

use Aldrumo\Core\Models\Page;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PagesAdmin extends Component
{
    public $pages;

    public $editModel = false;

    public $editPage;

    public $blocks = [];

    protected $listeners = [
        'pageCreated'
    ];

    public function mount()
    {
        $this->loadPages();
    }

    public function render()
    {
        return view('Admin::livewire.pages-admin');
    }

    public function loadPages()
    {
        $this->pages = Page::orderBy('title', 'asc')->get();
    }

    public function closeModel()
    {
        $this->reset(['editModel', 'editPage']);
    }

    public function editPage($pageId)
    {
        $page = $this->pages->where('id', $pageId)->first();

        if ($page === null) {
            $page = Page::where('id', $pageId)->first();
        }

        $this->editPage = $page;
        $this->editModel = true;
    }

    public function savePage()
    {
        try {
            $this->editPage->save();

            $this->editPage->saveBlocks(collect($this->blocks));
        } catch (\Exception $e) {
            // error
            Log::info($e);
            return;
        }

        $this->reset(['blocks', 'editModel', 'editPage']);
        $this->loadPages();

        session()->flash(
            'success',
            __('Page has been saved successfully.')
        );
    }

    public function pageCreated(int $pageId)
    {
        $this->loadPages();

        session()->flash(
            'success',
            __('Page has been created successfully.')
        );

        $this->editPage($pageId);
    }
}
