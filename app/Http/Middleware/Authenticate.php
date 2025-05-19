<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Redirecciona a login si no está autenticado.
     */
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            return route('inicio');
        }

        return null;
    }

    /**
     * Maneja la solicitud e impide que el navegador guarde en caché
     * las páginas protegidas para evitar el botón atrás después de logout.
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::guard($guards[0] ?? null)->check()) {
            return redirect()->route('login');
        }

        $response = $next($request);

        // 🔒 Bloqueo de caché (esto es lo que evita volver con la flecha atrás)
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        return $response;
    }
}
