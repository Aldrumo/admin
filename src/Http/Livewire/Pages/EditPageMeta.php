<?php

namespace Aldrumo\Admin\Http\Livewire\Pages;

use Aldrumo\Core\Models\Page;
use Aldrumo\RouteLoader\Generator;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditPageMeta extends Component
{
    public $edit = false;

    public Page $page;

    protected $rules = [
        'page.title' => 'required',
        'page.slug'  => 'required',
    ];

    public function render()
    {
        return view('Admin::livewire.pages.edit-page-meta');
    }

    public function toggleEdit()
    {
        $this->edit = !$this->edit;
    }

    public function save()
    {
        $this->page->save();
        $this->emitUp('metaUpdated');
        $this->edit = false;
    }
}
