<?php

namespace Sacranet\Http\Controllers;

use Illuminate\Http\Request;

use Sacranet\Http\Requests;
use Sacranet\Http\Requests\UsuarioRequest;
use Sacranet\Http\Controllers\Controller;
use Sacranet\Usuario;
use Sacranet\Turma;
use Datatables;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuario.index');
    }

    public function dados()
    {
        $usuarios = Usuario::select(['id','nome','login','tipo']);

        return Datatables::of($usuarios)->addColumn('acoes', function ($usuario) {
            $editarurl = route('usuarios.editar',[$usuario->id]);
            $excluirurl = route('usuarios.excluir',[$usuario->id]);
            return '<a href="'.$editarurl.'" class="btn btn-primary btn-sm" title="Editar"><i class="glyphicon glyphicon-pencil"></i></a>'.
            ' <a href="'.$excluirurl.'" class="btn btn-danger btn-sm" id="excluir" title="Excluir"><i class="glyphicon glyphicon-remove"></i></a>';
        })->make(true);



    }

    public function create()
    {
        $turmas = Turma::with('serie')->get();
        return view('usuario.create',compact('turmas'));
    }


    public function store(UsuarioRequest $request)
    {
        if($request->ajax()){



            $usuario =  Usuario::create($request->except( ['turmas'] ));
            $turmas =  $request->input('turmas');

            $usuario->turmas()->sync($turmas);



            return response()->json(['sucesso' => 'Usuário Criado com Sucesso!']);



        }

    }


    public function edit($id)
    {
       try{
            $usuario = Usuario::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('usuarios.cadastrar');
        }

        $turmas = Turma::with('serie')->get();
        $usuario->turmas;
        $usuarioturmas = [];

        foreach($usuario->turmas as $t){
            $usuarioturmas[] = $t->id;
        }


        return view('usuario.edit',compact('usuario','turmas','usuarioturmas'));


    }


    public function update(UsuarioRequest $request, $id)
    {
        if($request->ajax() ){
            $usuario = Usuario::find($id);
            $usuario->update($request->except(['turmas']));

            $turmas =  $request->input('turmas');
            $usuario->turmas()->sync($turmas);


            return response()->json(['sucesso' => 'Usuário Editado com Sucesso!']);

        }

    }


    public function destroy($id)
    {

        $usuario = Usuario::find($id);
        $usuario->turmas()->sync([]);
        $usuario->delete();

        return response()->json(['sucesso' => 'Usuário Excluído com Sucesso']);

    }
}
