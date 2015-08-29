<?php

namespace Sacranet\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Hash;
use Sacranet\Http\Requests;
use Sacranet\Aluno;

class AlunoController extends Controller
{
    public function upload(Request $request)
    {
        set_time_limit(1500);
        if($request->hasFile('alunos')){

            $arquivo = $request->file('alunos');
            $arquivo->move('upload','alunos.txt');

            $arraydados = Aluno::geradados('upload/alunos.txt');


            Aluno::truncate();

            foreach($arraydados as $aluno){
               Aluno::create($aluno);
            }



        }

    }
}
