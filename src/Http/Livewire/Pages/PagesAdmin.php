<?php

namespace Aldrumo\Admin\Http\Livewire\Pages;

use Aldrumo\Core\Models\Page;
use Aldrumo\RouteLoader\Generator;
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
        'pageCreated',
        'metaUpdated',
    ];

    public function mount()
    {
        $this->loadPages();
    }

    public function render()
    {
        return view('Admin::livewire.pages.pages-admin');
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
        $this->editPage = $this->findPage($pageId);
        $this->editModel = true;
    }

    public function savePage()
    {
        try {
            info($this->editPage->title);

            $this->editPage->save();

            $this->editPage->saveBlocks(collect($this->blocks));
        } catch (\Exception $e) {
            return session()->flash(
                'modal.error',
                __('Could not save the page.')
            );
        }

        $this->reset(['blocks', 'editModel', 'editPage']);
        $this->clearRoutes();
        $this->loadPages();

        session()->flash(
            'success',
            __('Page has been saved successfully.')
        );
    }

    public function deletePage($pageId)
    {
        $this->deletePage = $this->findPage($pageId);
        $this->deleteModal = true;
    }

    public function confirmDelete()
    {
        try {
            $this->deletePage->delete();
        } catch (\Exception $e) {
            return session()->flash(
                'modal.error',
                __('Could not delete the page.')
            );
        }

        $this->reset(['deleteModal', 'deletePage']);
        $this->clearRoutes();
        $this->loadPages();

        session()->flash(
            'success',
            __('Page has been deleted.')
        );
    }

    public function toggleActive($pageId)
    {
        $page = $this->findPage($pageId);
        $page->is_active = ! $page->is_active;

        try {
            $page->save();
        } catch (\Exception $e) {
            return session()->flash(
                'error',
                $page->is_active === true ?
                    __('There was a problem activating the page') :
                    __('There was a problem deactivating the page')
            );
        }

        $this->clearRoutes();
        $this->loadPages();

        return session()->flash(
            'success',
            $page->is_active === true ?
                __('Page activated') :
                __('Page deactivated')
        );
    }

    /**
     * EVENT LISTENERS
     */

    public function pageCreated(int $pageId)
    {
        $this->clearRoutes();

        $this->loadPages();

        session()->flash(
            'modal.success',
            __('Page has been created successfully.')
        );

        $this->editPage($pageId);
    }

    public function metaUpdated()
    {
        $this->clearRoutes();
        $this->editPage->refresh();
    }

    /**
     * HELPERS
     */

    protected function findPage(int $pageId): Page
    {
        $page = $this->pages->where('id', $pageId)->first();

        if ($page === null) {
            $page = Page::where('id', $pageId)->first();
        }

        return $page;
    }

    protected function clearRoutes()
    {
        resolve(Generator::class)->regenerateRoutes();
    }
}
