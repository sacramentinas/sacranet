<?php

namespace Sacranet\Http\Controllers;

use Illuminate\Http\Request;

use Sacranet\Http\Requests;
use Sacranet\Http\Controllers\Controller;
use Sacranet\Aluno;

class OcorrenciaController extends Controller
{

    public function index()
    {

    }

    public function turma($turma){

        $alunos = Aluno::where('turma_id',$turma)->orderBy('numero')->get();

        return view('ocorrencias.turma',compact('alunos'));

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
