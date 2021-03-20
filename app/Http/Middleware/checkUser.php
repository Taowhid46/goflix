<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checkUser
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
        if(Session::get('customerEmail') === null)
        {
            return redirect('/order')->with('successMessage','Please Log In First !');
        }
        return $next($request);
    }
}
