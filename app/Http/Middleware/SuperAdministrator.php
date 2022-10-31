<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdministrator
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
        if ($request->session()->get('user_status') !== 'admin')
        {
            return redirect(env('APP_ADMIN_SECTION'));
        }

        return $next($request);
    }
}
