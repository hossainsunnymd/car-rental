<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next):Response
    {



        $token = $request->cookie('token');

        $result = JWTToken::verifyToken($token);

        if ($result == 'unauthorized') {
            return redirect('/sign-in-page');
        }else{
            $request->headers->set('user_id', $result->user_id);
            $request->headers->set('user_email', $result->user_email);
            return $next($request);
        }
    }
}
