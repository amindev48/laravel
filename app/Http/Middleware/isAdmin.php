<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\rejection_for;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $role_main)
    {
        if (Auth::check()){
            $user = Auth::user();
            foreach ($user->roles as $role){
                if ($role->name == $role_main){
                    return $next($request);
                    return redirect('admin');
                }else{
                    return redirect('/home');
                }
            }
        }else{
            return redirect('login');
        }

    }
}
