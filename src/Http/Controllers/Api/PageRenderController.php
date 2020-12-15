<?php

namespace Aldrumo\Admin\Http\Controllers\Api;

use Aldrumo\Core\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageRenderController
{
    public function __invoke(Request $request, int $id)
    {
        $page = Page::findOrFail($id);

        return view(
            $page->template,
            [
                'page' => $page,
            ]
        );
    }
}
