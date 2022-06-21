<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check())
        {
            $user = Auth::user();
            // nếu type =1 or 2 (admin) thì cho qua.
            if ($user->type == 1 || $user->type == 2 )
            {
                return $next($request);
            }
            else
            {
                return redirect(route('login.admin'));
            }
        } else
        return redirect(route('login.admin'));
        
    }
}
