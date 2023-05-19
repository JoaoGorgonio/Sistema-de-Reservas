<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginAuth
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('cd_token') == null) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}

