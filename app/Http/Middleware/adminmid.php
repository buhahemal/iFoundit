<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class adminmid
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
        if(Session::has('Admin_Id') && Session::has('AdminName'))
        {
                return $next($request);
        }
        else
        {
            return redirect('/Adminlogin');
        }
    }
}
