<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            // Verifica se o token JWT é válido
            $user = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            // Se o token for inválido ou não encontrado, retorna erro
            return response()->json(['error' => 'Token inválido'], 401);
        }

        return $next($request);
    }
}