<?php

namespace App\Http\Middleware;
use App\Models\Admin;

use Closure;
use Session;

session_start();

class AdminMiddleware
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
        if(isset($_COOKIE['name'])){
            return $next($request);
        }
        return redirect(route('admin.showLogin'));
    }
}
