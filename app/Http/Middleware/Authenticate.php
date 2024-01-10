<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if(! $request->expectsJson()){
            if($request->routeIs('employee.*')){
                return route('employee.login');
            }
            elseif($request->routeIs('admin.*')){
                return route('admin.login');
            }
            else {
                // Redirect all other routes to the default home page
                return route('/');
            }
        }
        return null; // Let the request proceed for JSON requests
        //return $request->expectsJson() ? null : route('login');
    }


}
