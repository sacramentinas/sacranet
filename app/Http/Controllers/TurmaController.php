<?php

namespace Sacranet\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Sacranet\Http\Requests\TurmaRequest;
use Sacranet\Serie;
use Sacranet\Turma;

use Datatables;

class TurmaController extends Controller
{

    public function index()
    {
        return view('turma.index');
    }

    public function dados()
    {
        $series = Serie::select(['id','cod_sei','nome']);

        return Datatables::of($series)->addColumn('acoes', function ($serie) {
            $editarurl = route('turmas.editar',[$serie->id]);
            $excluirurl = route('turmas.excluir',[$serie->id]);
            return '<a href="'.$editarurl.'" class="btn btn-primary btn-sm" title="Editar"><i class="glyphicon glyphicon-pencil"></i></a>'.
                   ' <a href="'.$excluirurl.'" class="btn btn-danger btn-sm" id="excluir" title="Excluir"><i class="glyphicon glyphicon-remove"></i></a>';
        })->make(true);



    }

    public function create()
    {
        return view('turma.create');
    }


    public function store(TurmaRequest $request)
    {
        if($request->ajax()){



          $serie =  Serie::create($request->except( ['turmas'] ));
          $turmas =  $request->input('turmas');

          foreach($turmas as $turma){

              $serie->turmas()->save(Turma::create(['letra' => $turma ]));

          }

            return response()->json(['sucesso' => 'Turma Criada com Sucesso!']);



        }

    }


    public function edit($id)
    {
        try{
             $serie = Serie::findOrFail($id);
        }catch(ModelNotFoundException $e){
              return redirect()->route('turmas.cadastrar');
        }

       $turmas = $serie->turmas()->lists('letra')->toArray();


       return view('turma.edit',compact('serie','turmas'));


    }


    public function update(TurmaRequest $request, $id)
    {
        if($request->ajax() ){
           $serie = Serie::find($id);
           $serie->update($request->except(['turmas']));
           $serie->turmas()->delete();

            $turmas =  $request->input('turmas');

            foreach($turmas as $turma){
                $serie->turmas()->save(Turma::create(['letra' => $turma ]));
            }

            return response()->json(['sucesso' => 'Turma Editada com Sucesso!']);
        }

    }


    public function destroy($id)
    {

        $serie = Serie::find($id);
        $serie->turmas()->delete();
        $serie->delete();

        return response()->json(['sucesso' => 'Turma Excluida com Sucesso']);

    }
}
