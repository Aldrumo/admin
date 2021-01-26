<?php

namespace Aldrumo\Admin\Http\Controllers\Api;

use Aldrumo\Core\Models\Page;
use Aldrumo\ThemeManager\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class PageRenderController
{
    /** @var ThemeManager */
    protected $themeManager;

    public function __construct(ThemeManager $themeManager)
    {
        $this->themeManager = $themeManager;
    }

    public function __invoke(Request $request, int $id)
    {
        $page = Page::with('blocks')
            ->findOrFail($id);

        View::share([
            'inEditor' => true,
            'contentBlocks' => $page->blocks,
        ]);

        return view(
            $this->themeManager->activeTheme()->packageName() . '::' .
            $page->template,
            [
                'page' => $page,
            ]
        );
    }
}
