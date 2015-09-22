<?php

namespace Sacranet\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Sacranet\Disciplina;
use Sacranet\Http\Requests;
use Sacranet\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use Sacranet\Http\Requests\DisciplinaRequest;

class DisciplinaController extends Controller
{

    public function index()
    {
        return view('disciplinas.index');
    }

    public function dados()
    {
        $disciplinas =  Disciplina::select(['id','descricao'])->orderBy('id');

        return Datatables::of($disciplinas)->addColumn('acoes', function ($disciplinas) {
            $editarurl = route('disciplinas.editar',[$disciplinas->id]);
            $excluirurl = route('disciplinas.excluir',[$disciplinas->id]);
            return '<a href="'.$editarurl.'" class="btn btn-primary btn-sm" title="Editar"><i class="glyphicon glyphicon-pencil"></i></a>'.
            ' <a href="'.$excluirurl.'" class="btn btn-danger btn-sm" id="excluir" title="Excluir"><i class="glyphicon glyphicon-remove"></i></a>';
        })->make(true);
    }

    public function create()
    {
        return view('disciplinas.create');
    }


    public function store(DisciplinaRequest $request)
    {
       if($request->ajax())
       {
            Disciplina::create($request->all());

           return response()->json(['sucesso' => 'Disciplina criada com sucesso!']);
       }

    }

    public function edit($id)
    {
        try
        {
           $disciplina =  Disciplina::findOrFail($id);

        }catch (ModelNotFoundException $e)
        {
            return redirect()->route('disciplinas.index');
        }

        return view('disciplinas.edit',compact('disciplina'));
    }

    public function update(DisciplinaRequest $request, $id)
    {
        Disciplina::find($id)->update($request->all());

        return response()->json(['sucesso' => 'Disciplina Editada com Sucesso']);
    }


    public function destroy($id)
    {
        Disciplina::find($id)->delete();

        return response()->json(['sucesso' => 'Disciplina Excluída com Sucesso!']);
    }
}
