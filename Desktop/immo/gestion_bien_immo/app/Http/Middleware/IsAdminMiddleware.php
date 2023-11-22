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
                return redirect('/dashbord')->with('message', 'Accès réfusé puisque vous n\'êtes pas Admin');
            }
        } else {
        }
        return redirect('/login')->with('message', 'Connecte toi pour accéder à ton espace');

        return $next($request);
    }
}
;;;;;;;;;