<?php

namespace Aldrumo\Admin\Http\Livewire\Pages;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditPage extends Component
{
    public $page;

    public $blocks = [];

    public $modalOpen = false;

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
        Log::info($this->page);
        Log::info($this->blocks);
    }

    public function processBlock($key, $content)
    {
        $this->blocks[] = [
            'key' => $key,
            'content' => $content
        ];
    }
}
