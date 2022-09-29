<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class UserMiddleware
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
         if(Auth::check()){
            if(Auth::user()->role=="user"){
                return $next($request);
            }
            else if(Auth::user()->role=="subadmin"){
                return redirect("/sub-admin");
            }
            else{
                return redirect("/admin");
            }
        }
        else{  
            return redirect("/login");
        }
        return $next($request);
    }
}
