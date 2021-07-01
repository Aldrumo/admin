<?php

namespace Aldrumo\Admin\Http\Livewire\Themes;

use Aldrumo\Core\Models\Theme;
use Livewire\Component;

class ThemeAdmin extends Component
{
    public $themes;
    public $installed;

    public function mount()
    {
        $this->discoverThemes();
        $this->getInstalledThemes();
    }

    public function render()
    {
        return view('Admin::livewire.themes.theme-admin');
    }

    public function discoverThemes()
    {
        $this->themes = collect(app()->tagged('aldrumo-theme'));
    }

    public function getInstalledThemes()
    {
        $this->installed = Theme::orderBy('is_active', 'desc')
            ->orderBy('name', 'asc')
            ->get();
    }
}
