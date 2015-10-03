<?php

namespace Sacranet\Http\Controllers;

use Illuminate\Http\Request;

use Sacranet\Disciplina;
use Sacranet\Http\Requests;
use Sacranet\Http\Controllers\Controller;
use Sacranet\Aluno;
use Sacranet\Ocorrencia;
use Sacranet\TipoOcorrencia;

class OcorrenciaController extends Controller
{

    public function index()
    {

    }

    public function turma($turma){

        $alunos = Aluno::where('turma_id',$turma)->with('turma')->orderBy('numero')->get();


        $disciplinas = Disciplina::select('id','descricao')->lists('descricao','id')->toArray();
        $disciplinas =  array_merge(['' => ''],$disciplinas);


        $tipoOcorrencias = TipoOcorrencia::all();


        return view('ocorrencias.turma',compact('alunos','tipoOcorrencias','disciplinas'));

    }

    public function turmaSalvar(Request $request,$turma )
    {
       $ocorrencia =  Ocorrencia::create([
            'disciplina_id'     => $request->input('disciplina'),
            'turma_id'          => $turma,
            'unidade'           => $request->input('unidade'),
            'data'              => $request->input('data'),
            'descricao'         => $request->input('descricao')
        ]);

        foreach($request->input('alunos') as $aluno)
        {

        $a = Aluno::find($aluno);
        $ocorrencia->alunos()->attach($aluno,['matricula' => $a->matricula] );

        }
    }

    public function create()
    {

    }


    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
