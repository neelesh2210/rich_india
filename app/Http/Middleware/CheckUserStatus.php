<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class CheckUserStatus
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
        if(Auth::guard('web')->user()->status == '0'){
            Auth::guard('web')->logout();
            return redirect()->route('index')->with('success','You Have Logged out Successfully!');
        }elseif(Auth::guard('web')->user()->status == '1'){
            return $next($request);
        }
    }
}
