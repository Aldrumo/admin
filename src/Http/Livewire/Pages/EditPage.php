<?php

namespace Aldrumo\Admin\Http\Livewire\Pages;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditPage extends Component
{
    public $page;

    public $blocks = [];

    public $modalOpen = false;

    protected $listeners = ['newPage'];

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
        try {
            $this->page->save();

            $this->page->saveBlocks(collect($this->blocks));
        } catch (\Exception $e) {
            // error
            Log::info($e);
        }

        $this->reset(['blocks', 'modalOpen']);
        $this->emitTo('pages-admin', 'pageSaved');
    }

    public function newPage($pageId)
    {
        if ($pageId === $this->page->id) {
            $this->toggleModel();

            return session()->flash(
                'success',
                __('Page created, loading editor...')
            );
        }
    }
}
