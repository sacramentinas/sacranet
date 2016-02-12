<?php

namespace Sacranet\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Sacranet\Aluno;
use Sacranet\Http\Requests;
use Sacranet\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Sacranet\Turma;
use Carbon\Carbon;

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


        $aniversariantes = Aluno::whereDay('datanascimento', '=',date('d'))->whereMonth('datanascimento', '=',date('m'))->get();

        return view('painel.inicial',compact('turmas','aniversariantes'));
    }




    public function sair(){

        Auth::admin()->logout();
        return redirect()->route('admin.login');
    }


    public function aniversariantes(Request $request)
    {
        $mes = $request->get('m');
        $aniversariantes = [];
        if($mes){
            $aniversariantes = Aluno::whereMonth('datanascimento', '=',$mes)->orderby('nomealuno')->get()
                ->sortBy(function($date) { return Carbon::parse($date->datanascimento)->format('d');  })
                ->groupBy(function($date) { return Carbon::parse($date->datanascimento)->format('d');  });

        }
        return view('painel.aniversariantes',compact('aniversariantes'));
    }


}
