<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class usermid 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { 
        if(Session::has('UserId') && Session::has('UserName'))
        {
                return $next($request);
        }
        else
        {
            return redirect('/login');
        }
    }
}
