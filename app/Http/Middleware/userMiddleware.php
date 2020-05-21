<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class userMiddleware
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
        if (Session::get('level') == null) {
            return redirect('login');
        }else{
            return $next($request);
        }
    }
}
