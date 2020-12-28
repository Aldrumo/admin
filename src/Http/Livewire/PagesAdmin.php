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

    public $deleteModal = false;

    public $deletePage;

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

    public function closeModal()
    {
        $this->reset(['editModel', 'editPage', 'deleteModal', 'deletePage']);
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
            return session()->flash(
                'error',
                __('Could not save the page.')
            );
        }

        $this->reset(['blocks', 'editModel', 'editPage']);
        $this->loadPages();

        session()->flash(
            'success',
            __('Page has been saved successfully.')
        );
    }

    public function deletePage($pageId)
    {
        $page = $this->pages->where('id', $pageId)->first();

        if ($page === null) {
            $page = Page::where('id', $pageId)->first();
        }

        $this->deletePage = $page;
        $this->deleteModal = true;
    }

    public function confirmDelete()
    {
        try {
            //$this->deletePage->delete();
            throw new \Exception('test');
        } catch (\Exception $e) {
            return session()->flash(
                'error',
                __('Could not delete the page.')
            );
        }

        $this->reset(['deleteModal', 'deletePage']);
        $this->loadPages();

        session()->flash(
            'success',
            __('Page has been deleted.')
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
