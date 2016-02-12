<?php

namespace Sacranet\Http\Controllers;

use Illuminate\Http\Request;

use Sacranet\Aluno;
use Sacranet\Disciplina;
use Sacranet\TipoOcorrencia;
use Sacranet\Nota;
use Sacranet\Ocorrencia;
use Sacranet\Turma;
use Sacranet\Http\Requests;
use Sacranet\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ResponsavelController extends Controller
{

    public function index()
    {
        return view('responsavel.login');
    }

    public function login(Request $dados)
    {
        Auth::aluno()->attempt([
            'matricula' => $dados->get('matricula'),
            'password' => $dados->get('senha')
        ]);

        if(Auth::aluno()->check()){
           // return redirect()->route('responsavel.perfil');
            return redirect()->to('http://www.colegiosacramentinas.com.br/sacranet');
        }else{
            return back()->withInput()->with('erro','Matrícula e/ou Senha Inválidos');
        }

    }

    public function perfil(){
            $id = Auth::aluno()->user()->id;
        $aluno = Aluno::find($id);

        $ocorrencias = $aluno->ocorrencias->groupBy('data')->sortByDesc('data');
        $quantidade['negativa'] = 0;
        $quantidade['positiva'] = 0;

        foreach($ocorrencias as $ocorrencia) {
            foreach ($ocorrencia as $o) {
                if ($o->tipoocorrencias[0]->tipo == 'Negativa') {
                    $quantidade['negativa']++;
                } else {
                    $quantidade['positiva']++;
                }
            }
        }

       // dd($aluno->turma->serie->nome);

        return view('responsavel.perfil',compact('aluno','ocorrencias','quantidade'));


    }

    public function sair()
    {
        Auth::aluno()->logout();
        return redirect()->route('responsavel.login');
    }


}
