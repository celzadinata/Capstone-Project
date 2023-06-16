<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResellerMiddleware
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
        if (Auth::check()) {
            if (Auth::user()->role === 'reseller') {
                return $next($request);
            } else {
                return back()->with('error', 'Tidak mempunyai akses, silahkan membuat akun Reseller!');
            }
        } else {
            return redirect('/login')->with('warning', 'Silahkan login terlebih dahulu');
        }
        return $next($request);
    }
}
