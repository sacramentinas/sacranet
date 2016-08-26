<?php

namespace Sacranet\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Sacranet\Disciplina;
use Sacranet\Http\Requests;
use Sacranet\Http\Controllers\Controller;
use Sacranet\Aluno;
use Sacranet\Http\Requests\OcorrenciaRequest;
use Sacranet\Ocorrencia;
use Sacranet\TipoOcorrencia;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class OcorrenciaController extends Controller
{

    public function index()
    {


        return view('ocorrencias.index');
    }

    public function dados()
    {
        $ocorrencias = Ocorrencia::where('ocorrencias.usuario_id',Auth::admin()->user()->id)
                                    ->join('turmas','ocorrencias.turma_id','=','turmas.id')
                                    ->join('disciplinas','ocorrencias.disciplina_id','=','disciplinas.id')
                                    ->join('series','series.id','=','turmas.serie_id')
                                    ->select('ocorrencias.id as id','ocorrencias.turma_id','ocorrencias.data','ocorrencias.unidade','turmas.letra as turma','disciplinas.descricao as disciplina','series.nome as serie')
                                    ->orderBy('ocorrencias.data', 'desc');


        return Datatables::of($ocorrencias)->addColumn('acoes', function ($ocorrencias) {
            $editarurl = route('ocorrencias.turma.editar',[$ocorrencias->turma_id,$ocorrencias->id]);
            $excluirurl = route('ocorrencias.excluir',[$ocorrencias->id]);
            return '<a href="'.$editarurl.'" class="btn btn-primary btn-sm" title="Editar"><i class="glyphicon glyphicon-pencil"></i></a>'.
            ' <a href="'.$excluirurl.'" class="btn btn-danger btn-sm" id="excluir" title="Excluir"><i class="glyphicon glyphicon-remove"></i></a>';
        })->edit_column('turma', function($row) {
            return "{$row->serie} - {$row->turma}";
        })->edit_column('data', function($row) {
            $data =  new \DateTime($row->data);
            return $data->format('d/m/Y');
        })->edit_column('unidade', function($row) {
           if($row->unidade == 1){
               return "I Unidade";
           }else if($row->unidade == 2){
               return "II Unidade";
           }else if($row->unidade == 3){
               return "III Unidade";
           }else{
               return $row->unidade;
           }
        })->make(true);



    }



    public function turma($turma){

        $alunos = Aluno::where('turma_id',$turma)->with('turma')->orderBy('numero')->get();
        $disciplinas[""] = "";
        foreach(Disciplina::lists('descricao','id')->toArray() as $i =>  $d){
            $disciplinas[$i] = $d;
        }

        $tipoOcorrencias = TipoOcorrencia::all();





        return view('ocorrencias.turma',compact('alunos','tipoOcorrencias','disciplinas'));

    }

    public function turmaeditar($turma,$id)
    {
        $alunos = Aluno::where('turma_id',$turma)->with('turma')->orderBy('numero')->get();
        $disciplinas[""] = "";
        foreach(Disciplina::lists('descricao','id')->toArray() as $i =>  $d){
            $disciplinas[$i] = $d;
        }

        $tipoOcorrencias = TipoOcorrencia::all();
        $ocorrencia = Ocorrencia::find($id);

        $url = $_SERVER['HTTP_REFERER'];

        $pedaco = explode('/',$url);
        $last = array_pop($pedaco);

        if($last != 'perfil'){
            $url = "";
        }

        return view('ocorrencias.turmaeditar',compact('ocorrencia','alunos','tipoOcorrencias','disciplinas','url'));
    }

    public function turmaupdate(OcorrenciaRequest $request,$turma,$id)
    {
        $ocorrencia = Ocorrencia::find($id);


        $ocorrencia->update([
            'disciplina_id'     => $request->input('disciplina_id'),
            'turma_id'          => $turma,
            'unidade'           => $request->input('unidade'),
            'data'              => $request->input('data'),
            'descricao'         => $request->input('descricao')
        ]);


        $ocorrencia->tipoocorrencias()->sync($request->input('ocorrencia'));
        $ocorrencia->alunos()->sync( $request->input('alunos') );

        return response()->json(['sucesso' => 'Ocorrência Editada com Sucesso!']);

    }

    /**
     * @param OcorrenciaRequest $request
     * @param $turma
     * @return \Illuminate\Http\JsonResponse
     */
    public function turmaSalvar(OcorrenciaRequest $request,$turma)
    {

       $idusuario = Auth::admin()->user()->id;
       $ocorrencia =  Ocorrencia::create([
            'disciplina_id'     => $request->input('disciplina_id'),
            'turma_id'          => $turma,
            'unidade'           => $request->input('unidade'),
            'data'              => $request->input('data'),
            'descricao'         => $request->input('descricao'),
            'usuario_id'         => $idusuario
        ]);

        $ocorrencia->tipoocorrencias()->attach($request->input('ocorrencia'));
        $ocorrencia->alunos()->attach($request->input('alunos') );
        
        return response()->json(['sucesso' => 'Ocorrência Cadastrada com Sucesso!']);

    }

    public function individualSalvar(OcorrenciaRequest $request,$turma)
    {

        $ocorrencia =  Ocorrencia::create([
            'disciplina_id'     => $request->input('disciplina_id'),
            'turma_id'          => $turma,
            'unidade'           => $request->input('unidade'),
            'data'              => $request->input('data'),
            'descricao'         => $request->input('descricao'),
            'usuario_id'         => Auth::admin()->user()->id
        ]);

        $ocorrencia->tipoocorrencias()->attach($request->input('ocorrencia'));
        $ocorrencia->alunos()->attach($request->input('alunos'));




        return response()->json(['sucesso' => 'Ocorrência Cadastrada com Sucesso!']);

    }



    public function destroy($id)
    {
       $ocorrencia =  Ocorrencia::find($id);
       $ocorrencia->tipoocorrencias()->sync([]);
       $ocorrencia->alunos()->sync([]);

       $ocorrencia->delete();
       return response()->json(['sucesso' => 'Ocorrência Excluída com Sucesso!']);
    }

    public function excluirAluno($ocorrencia,$aluno){
        $ocorrencia =  Ocorrencia::find($ocorrencia);

       if(count($ocorrencia->alunos) == 1 ){
            $ocorrencia->tipoocorrencias()->sync([]);
            $ocorrencia->alunos()->sync([]);
            $ocorrencia->delete();
            return response()->json(['sucesso' => 'Ocorrência Excluída com Sucesso!']);
        }else{
            $ocorrencia->alunos()->detach($aluno);
           return response()->json(['sucesso' => 'Aluno foi Excluído da Ocorrência com Sucesso!']);
        }


    }
}
