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

        if(Auth::aluno()->guest())
        {
            return redirect()->guest('responsavel/login')->with('erro','É necessário estar logado!');
        }

        return $next($request);
    }
}
