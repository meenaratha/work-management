<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {


        $redirectUrl = $this->getRedirectUrl($guard);

        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     // if (Auth::guard($guard)->check()) {
        //     //     return redirect(RouteServiceProvider::HOME);
        //     // }
        // }
       // return $next($request);


      foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            // User is authenticated for the specified guard, proceed with the request
            return $next($request);
        }

        // User is not authenticated, redirect to the specified URL for the guard
        return redirect($redirectUrl);

          }

    }

    protected function getRedirectUrl($guard)
    {
        switch ($guard) {
            case 'admin':
                return '/admin/login';
            case 'employee':
                return '/employee/login';
            // Add more guards and their corresponding redirect URLs as needed
            default:
                return '/login';
        }
    }




}
