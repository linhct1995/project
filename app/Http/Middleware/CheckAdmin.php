<?php

namespace App\Http\Middleware;

use App\Models\Admin_User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
          
        // dd($request->all());
        $email = $request->email;
        $password = $request->password;
         $abc =  DB::table('admin_user')->where('email',$email)->first();
         if(Hash::check($password, $abc->password)){
            if ($abc->type == 1 || $abc->type == 2 )
            {
                return $next($request);
            }
            else
            {
                return redirect(route('login.admin'))->with('message','Bạn không phải là admin');
            }
        }
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
