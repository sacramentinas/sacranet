<?php

namespace Sacranet\Http\Controllers;

use Illuminate\Http\Request;

use Sacranet\Http\Requests;
use Sacranet\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Sacranet\Turma;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('painel.login');
    }

    public function login(Request $dados)
    {

        Auth::admin()->attempt([
            'login' => $dados->get('login'),
            'password' => $dados->get('senha')
        ]);

        if(Auth::admin()->check()){
            return redirect()->route('admin.index');
        }else{
            return back()->withInput()->with('erro','Login e/ou Senha Inválidos');
        }
    }

    public function painel()
    {
        // $turmas = Turma::with('serie')->get();
        $turmas = Auth::admin()->user()->turmas;



        return view('painel.inicial',compact('turmas'));
    }


    public function sair(){

        Auth::admin()->logout();
        return redirect()->route('admin.login');
    }

}
