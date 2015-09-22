<?php

namespace Sacranet\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Sacranet\Http\Requests;
use Sacranet\Http\Controllers\Controller;
use Sacranet\TipoOcorrencia;
use Datatables;
use Sacranet\Http\Requests\TipoOcorrenciaRequest;

class TipoOcorrenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

       return view('tipos.index');
    }

    public function dados()
    {
       $tipos =  TipoOcorrencia::select(['id','descricao','tipo'])->orderBy('id');



        return Datatables::of($tipos)->addColumn('acoes', function ($tipos) {
            $editarurl = route('tipos.editar',[$tipos->id]);
            $excluirurl = route('tipos.excluir',[$tipos->id]);
            return '<a href="'.$editarurl.'" class="btn btn-primary btn-sm" title="Editar"><i class="glyphicon glyphicon-pencil"></i></a>'.
            ' <a href="'.$excluirurl.'" class="btn btn-danger btn-sm" id="excluir" title="Excluir"><i class="glyphicon glyphicon-remove"></i></a>';
        })->make(true);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(TipoOcorrenciaRequest $request)
    {
        if($request->ajax()){

            TipoOcorrencia::create($request->all());

            return response()->json(['sucesso' => "Tipo de Ocorrência Criada com Sucesso!"]);

        }
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        try{
           $tipo =  TipoOcorrencia::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('tipos.cadastrar');
        }

        return view('tipos.edit',compact('tipo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(TipoOcorrenciaRequest $request, $id)
    {
       if($request->ajax()){
           $tipo = TipoOcorrencia::find($id);
           $tipo->update($request->all());

           return response()->json(['sucesso' => 'Tipo de Ocorrência Editado com Sucesso!']);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        TipoOcorrencia::find($id)->delete();
        return response()->json(['sucesso' => 'Tipo de Ocorrência Excluida com Sucesso']);
    }
}
