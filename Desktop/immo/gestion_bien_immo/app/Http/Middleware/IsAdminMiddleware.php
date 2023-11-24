<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Middleware\Redirect;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;



class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {

            if (Auth::user()->role == 'admin') {
                return $next($request);
            } else {
                return redirect()->back();
            }
        } else {
        }
        return redirect('/login');

        return $next($request);
    }
};;;;;;;;;
