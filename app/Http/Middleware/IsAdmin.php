<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
	/* Pass only if user is admin. */
        if (auth()->user()->isAdmin()) {
            return $next($request);
        }

	/* Todo: Redirect sensibly. */
        return redirect('/');
    }
}
