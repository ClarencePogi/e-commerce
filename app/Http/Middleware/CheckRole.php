<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        Log::info('Middleware is working', ['request' => $request->all()]);
        
        return $next($request);
        // return $next($request); // Allow if the user has one of the roles
        
        // return redirect('/no-access')->with('error', 'You do not have permission to access this page.');


    } 
}
