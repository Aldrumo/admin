<?php

namespace Aldrumo\Admin\Http\Livewire\Pages;

use Aldrumo\Core\Models\Page;
use Aldrumo\ThemeManager\ThemeManager;
use Livewire\Component;

class CreatePage extends Component
{
    public $modalOpen = false;

    public $templates = [];

    public $page = [
        'title' => '',
        'template' => '',
    ];

    public function mount(ThemeManager $manager)
    {
        $this->templates = $manager->activeTheme()->availableViews();
    }

    public function render()
    {
        return view('Admin::livewire.pages.create-page');
    }

    public function toggleModel()
    {
        $this->modalOpen = ! $this->modalOpen;
    }
}
