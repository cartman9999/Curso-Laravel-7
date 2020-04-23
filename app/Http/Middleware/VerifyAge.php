<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

/**
 * Middleware encargado de verificar que el usuario sea mayor de edad
 * Para acceder a un Middleware lo podemos hacer desde la clase o agregandolo
 * de forma global. Para agregarlo de forma global es necesario acceder al archivo 
 * app/Htpp/Kernel.php y registrarlo en el array $routeMiddleware
 */
class VerifyAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $dateOfBirth    = \Auth::user()->birthday;
        $years          = Carbon::parse($dateOfBirth)->age;

        // Si la condición se satisface le permite el acceso al request solicitado
        // de lo contrario se devuelve un error 404
        // Nota: no es obligatorio hacer un 404, pudo ser un redirect a cualquier pagina
        // lo que sí es obligatorio es agregar $next($request) para permitir 
        // el acceso al request
        return ($years >= 18) ? $next($request) : abort(404);
    }
}
