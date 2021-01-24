<?php

namespace Aldrumo\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InjectEditor
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->setContent(
            str_replace(
                '</body>',
                $this->editorJs() . '</body>',
                $response->getContent()
            )
        );

        return $response;
    }

    public function editorJs(): string
    {
        return '<script src="/tinymce/tinymce.min.js"></script>' .
            '<script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    let editors = document.querySelectorAll(".content-editor");

                    for (let i = 0; i < editors.length; ++i) {
                        tinymce.init({
                            selector: ".content-editor",
                            inline: true,
                            menubar: false,
                            plugins: "link image",
                            toolbar: "undo redo | alignnone alignleft aligncenter alignright alignjustify |" .
                             "styleselect | backcolor forecolor | bold italic | link image",
                            image_advtab: true,
                        });
                    }
                });
            </script>';
    }
}
