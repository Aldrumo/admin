<?php

namespace Aldrumo\Admin\Http\Controllers\Api;

use Aldrumo\Core\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class PageRenderController
{
    public function __invoke(Request $request, int $id)
    {
        $page = Page::with('blocks')
            ->findOrFail($id);

        View::share([
            'inEditor' => true,
            'contentBlocks' => $page->blocks,
        ]);

        return view(
            $page->template,
            [
                'page' => $page,
            ]
        );
    }
}
