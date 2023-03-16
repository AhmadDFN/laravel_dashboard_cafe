<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class roleOperator
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
        if(Auth::check() && (Auth::user()->role=="Admin" || Auth::user()->role=="Operator")){
            return $next($request);
        }
        
        // Jika tidak punya akses yaitu belum login dan level bukan admin dan operator
        $mess = [
            "type" => "warning",
            "text" => "Maaf anda tidak punya akses"
        ];
        return redirect('/')->with($mess);
    }
}
