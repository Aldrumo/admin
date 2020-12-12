<?php

namespace Aldrumo\Admin\Http\Livewire\Pages;

use Aldrumo\Core\Models\Page;
use Aldrumo\ThemeManager\ThemeManager;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreatePage extends Component
{
    public $modalOpen = false;

    public $templates = [];

    public $page = [
        'title' => '',
        'template' => '',
    ];

    protected $validationAttributes = [
        'page.title' => 'page title',
        'page.template' => 'page template',
    ];

    protected function rules()
    {
        return [
            'page.title'    => ['required'],
            'page.template' => [
                'required',
                Rule::in($this->templates->keys()),
            ],
        ];
    }

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

    public function createPage()
    {
        $this->validate($this->rules());

        $page = new Page([
            'title' => $this->page['title'],
            'template' => $this->page['template'],
        ]);


    }
}
