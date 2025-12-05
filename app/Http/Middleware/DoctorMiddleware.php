<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DoctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role_as == 'doctor') {

                if (Auth::user()->doctor->type_agent_id == 1 )
                    return $next($request);
                else
                    return redirect('/dashboard');
            } else {
                return redirect('/dashboard');
            }
        } else {
            return redirect('/');
        }

    }
}
