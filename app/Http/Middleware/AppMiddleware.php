<?php

namespace App\Http\Middleware;

use App\Util;
use Closure;
use Illuminate\Http\Request;

class AppMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Util::notify("This is a notification demo to serve the website",['type'=> 'S']);
        // Util::notify(Util::translate("Agpi.com has been crashed. try our development tools now?"),['type'=> 'E', 'textTitle' => 'Crash Report']);
        return $next($request);
    }
}
