<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsDashboard
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
        $checkAuth = Auth::check();
        if ($checkAuth == false)
        {
           return $next($request);
           // kalo check auth bener maka di dilanjutkan ke Controller
        }
        
        return redirect()->route('beranda');
    }
}
