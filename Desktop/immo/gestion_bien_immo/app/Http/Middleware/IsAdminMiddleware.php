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
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->user()->role == 'admin') {
            return $next($request);
        } else {
            //dd('no way');
            return redirect()->back()->with('success', 'You have not admin acess');

            // return back()->withErrors(['error' => 'Vous navez pas acces a cette page']);
        }
    }
}
