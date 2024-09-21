<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        foreach ($roles as $role) {
            if(Auth::user()->hasRole($role)){
                return $next($request);
            }
        }

        abort(403, 'Unauthorized action.');
        
        // return $next($request); // Allow if the user has one of the roles
        
        // return redirect('/no-access')->with('error', 'You do not have permission to access this page.');


    } 
}
