<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerify{

    public function handle(Request $request, Closure $next): Response{

        if(!auth('sanctum')->check()){

            return response()->json('Acesso não autorizado!');

        }

       return $next($request);

    }

}