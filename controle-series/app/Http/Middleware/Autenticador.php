<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * Filtro da requisição. Podemos executar algo antes ou depois da controller
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * Checando se a requisição é para rota entrar
         *
         * Checando se o usuario esta logado na aplicação.
         *  */
        if (!$request->is('entrar', 'registrar') && !Auth::check()) {
            return redirect('/entrar');
        }

        return $next($request);
    }
}
