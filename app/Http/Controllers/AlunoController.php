<?php

namespace Sacranet\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Hash;
use Sacranet\Http\Requests;
use Sacranet\Aluno;
use Sacranet\Turma;

class AlunoController extends Controller
{


    public function index(Request $request)
    {

        $turmas = Turma::with('serie')->get();
        $busca = $request->get('p');
        $turma = $request->get('t');

        if($busca && $turma) {
            $alunos = Aluno::where('nomealuno','LIKE',"%$busca%")->where('turma_id',$turma)->paginate(12);
        }
        elseif($turma){
            $alunos = Aluno::where('turma_id',$turma)->paginate(70);
        }
        elseif($busca){
            $alunos = Aluno::where('nomealuno','LIKE',"%$busca%")->paginate(12);
        }else{
            $alunos = Aluno::paginate(12);
        }


        return view('aluno.index',compact('alunos','turmas'));
    }


    public function importar()
    {
        return view('aluno.importar');
    }

    public function upload(Request $request)
    {

        if($request->hasFile('alunos')){

            $arquivo = $request->file('alunos');


            $arquivo->move('upload','alunos.txt');

            $arraydados = Aluno::geradados('upload/alunos.txt');

           \File::delete('upload/alunos.txt');

            Turma::getTurma();
            Aluno::truncate();
            $cont = 0;

            foreach($arraydados as $aluno){
                $turma = Turma::checkTurma( $aluno['turma'],$aluno['codcurso']);
                unset($aluno['turma']);
                unset($aluno['codcurso']);
                Aluno::create($aluno)->turma()->associate($turma)->save();
                $cont++;
            }

            if($cont){
               $msg =  ['sucesso' => "$cont alunos importados com sucesso"];
            }else{
                $msg = ['erro' => "Nenhum aluno pode ser importado"];
            }

           return response()->json($msg);


        }

    }
}
