<?php

namespace Sacranet\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthResponsavel
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        }*/
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
        header('Access-Control-Allow-Credentials: true');

        if(Auth::aluno()->guest())
        {
            return redirect()->guest('responsavel/login')->with('erro','É necessário estar logado!');
        }

        return $next($request);
    }
}
