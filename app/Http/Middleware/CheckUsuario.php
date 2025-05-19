<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUsuario
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder.');
        }

        return $next($request);
    }
}
