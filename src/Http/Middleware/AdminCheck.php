<?php

namespace Aldrumo\Admin\Http\Middleware;

use Illuminate\Http\Request;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user()->is_admin) {
            return redirect()->back();
        }

        return $next($request);
    }
}
