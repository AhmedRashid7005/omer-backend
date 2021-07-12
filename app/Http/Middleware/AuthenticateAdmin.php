<?php

/**
 *
 * @date 14/12/2020
 * @package for admin login form admin table
 * @author Arafat
 *
 */

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticateAdmin
{
    public function handle($request, Closure $next)
    {
        //If request does not comes from logged in admin
        //then he shall be redirected to admin Login page
        if (!Auth::guard('admin')->check()) {
            return redirect()->route("adminLogin");
        }
        return $next($request);
    }
}