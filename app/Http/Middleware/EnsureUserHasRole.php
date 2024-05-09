<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure  $next
     * @param  mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if($request->user()->hasAnyRoles($roles) || !$roles)
        {
            return $next($request);
        }
        return redirect('/login');
    }
}
