<?php

namespace Sacranet\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Sacranet\Aluno_ocorrencia;
//use Sacranet\Boleto;
use Sacranet\Http\Requests;
use Sacranet\Aluno;
use Sacranet\Disciplina;
use Sacranet\TipoOcorrencia;
use Sacranet\Nota;
use Sacranet\Ocorrencia;
use Sacranet\Turma;
use Sacranet\Http\Requests\AlunoRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class AlunoController extends Controller
{


    public function index(Request $request)
    {

       // $turmas = Turma::with('serie')->get();
        $turmas = Auth::admin()->user()->turmas;
        $busca = $request->get('p');
        $turma = $request->get('t');

        Session::put('url',\URL::full());

        $turmas_id = [];

        foreach($turmas as $t){
            $turmas_id[] = $t['id'];
        }


        //DB::enableQueryLog();
        if($busca && $turma) {
            $alunos = Aluno::where(function($query) use ($busca){
                $query->where('nomealuno','LIKE',"%$busca%")
                    ->orwhere('matricula',$busca);
            })->where('turma_id',$turma)->wherein('turma_id',$turmas_id)->orderBy('id')->paginate(12);
        }
        elseif($turma){
            $alunos = Aluno::where('turma_id',$turma)->wherein('turma_id',$turmas_id)->orderBy('numero')->paginate(70);
        }
        elseif($busca){
            $alunos = Aluno::where(function($query) use ($busca){
                $query->where('nomealuno','LIKE',"%$busca%")
                    ->orwhere('matricula',$busca);
            })->wherein('turma_id',$turmas_id)->orderBy('id')->paginate(12);

        }else{
          $alunos = Aluno::orderBy('nomealuno')->wherein('turma_id',$turmas_id)->orderBy('id','desc')->paginate(12);

        }
        //DB::enableQueryLog();
      //  dd(DB::getQueryLog());

        $btnOcorrencias = ($turma) ? true : false;


        if($busca || $turma) {
            return view('aluno.busca',compact('alunos','turmas','btnOcorrencias'));
        }else{
            return view('aluno.index',compact('alunos','turmas','btnOcorrencias'));
        }
    }

    public function turmalistagem($turma){

        $alunos = Aluno::where('turma_id',$turma)->orderBy('numero')->get();

        return view('aluno.listagem',compact('alunos'));

    }
    public function carteirinha($turma){

        $alunos = Aluno::where('turma_id',$turma)->orderBy('numero')->get();

        return view('aluno.carteirinha',compact('alunos'));

    }

    public function create()
    {
        $tu = Turma::with('serie')->get();
        $turmas = [];
        $turmas[""] = "Selecione uma Turma";

        foreach($tu as $t){
            $turmas[$t->id] = $t->serie->nome." - ".$t->letra;
        }


        return view('aluno.create',compact('turmas'));
    }



    public function store(AlunoRequest $request)
    {

        if($request->ajax()){

            Aluno::create($request->all());
             return response()->json(['sucesso' => 'Aluno Cadastrado com Sucesso!']);

        }

    }

    public function perfil($id)
    {
        $aluno = Aluno::find($id);
        $ocorrencias = $aluno->ocorrencias()->paginate(10)->groupBy('data');

       // $ocorrencias = Ocorrencia::where('alunos_id',$id)->orderBy('data','desc')->groupBy('data')->get();
      /*  $boletos = Boleto::where('aluno_id',$id)->first();
        $data = explode("/",$boletos->vencimento);
        $mes = $data[1];
      */


        $quantoc = $aluno->ocorrencias;



        $quantidade['negativa'] = 0;
        $quantidade['positiva'] = 0;

      foreach($quantoc as $o) {

            if(isset($o->tipoocorrencias[0])) {
                if ($o->tipoocorrencias[0]->tipo == 'Negativa') {
                    $quantidade['negativa']++;
                } else {
                    $quantidade['positiva']++;
                }
            }

      }


        return view('aluno.perfil',compact('aluno','ocorrencias','quantidade','mes'));

    }

    public function ocorrencia($id)
    {
        $aluno = Aluno::find($id);
        $disciplinas[""] = "";
        foreach(Disciplina::lists('descricao','id')->toArray() as $i =>  $d){
            $disciplinas[$i] = $d;
        }

       $tipoOcorrencias = TipoOcorrencia::all();



        return view('aluno.ocorrencia',compact('aluno','tipoOcorrencias','disciplinas'));
    }


    public function edit($id)
    {
        $tu = Turma::with('serie')->get();
        $turmas = [];
        $turmas[""] = "Selecione uma Turma";

        foreach($tu as $t){
            $turmas[$t->id] = $t->serie->nome." - ".$t->letra;
        }

        $aluno = Aluno::find($id);

        return view('aluno.edit',compact('turmas','aluno'));

    }






    public function update($id,AlunoRequest $request)
    {
       $aluno = Aluno::find($id);
       $aluno->update($request->all());
        return response()->json(['sucesso' => 'Aluno Editado com Sucesso!']);

    }

    public function fotos(){

        $tu = Turma::with('serie')->get();
        $turmas = [];
        $turmas["todas"] = "Todas as Turmas";

        foreach($tu as $t){
            $turmas[$t->id] = $t->serie->nome." - ".$t->letra;
        }

         return view('aluno.upload',compact('turmas'));
    }



    public function uploadFotos(Request $request)
    {
        if($request->hasFile('fotos')) {
            $turma =  $request->input('turma');
            $mat = $request->input('matricula');
            $arquivo = $request->file('fotos');
            $local = public_path() . "/fotoaluno";



            if(Session::has('turma')){
                if($turma != Session::get('turma')){
                    Session::put('turma',$turma);
                    Session::forget('alunos');
                }else{
                    if( empty( Session::get('alunos',[] ) ) ){
                        Session::forget('alunos');
                    }
                }
            }else{
                Session::put('turma',$turma);
                Session::forget('alunos');
            }

            if($mat){
                Session::put('alunos',[ 0 => ['matricula' => $mat]]);
            }


            if($turma == 'todas' ){
                $nomearquivo = $arquivo->getClientOriginalName();

            }  else{

                if (Session::has('alunos'))
                {
                    $alunos = Session::get('alunos');
                }else{
                    $alunos = Aluno::where('turma_id',$turma)->select('matricula')->orderBy('numero')->get()->toArray();
                }

                $matricula = array_shift($alunos);
                Session::put('alunos',$alunos);

                $nomearquivo =  intval($matricula['matricula'] ).".".$arquivo->getClientOriginalExtension();

            }



            return $arquivo->move($local, $nomearquivo);
        }
    }


    public function removerfoto(Request $request)
    {
        $matricula = $request->input('matricula');
        \File::delete('fotoaluno/'.$matricula.'.jpg');
        return ['sucesso' => "Foto Excluída com Sucesso"];


    }

    public function importar()
    {
        return view('aluno.importar');
    }


    public function upload(Request $request)
    {

        if($request->hasFile('alunos')){

            set_time_limit(78000000);
            $arquivo = $request->file('alunos');
            $arquivo->move('upload','alunos.txt');

            $arraydados = Aluno::geradados('upload/alunos.txt');


            \File::delete('upload/alunos.txt');


           Turma::getTurma();

           DB::statement('SET FOREIGN_KEY_CHECKS=0;');
           DB::table('alunos')->delete();
           DB::statement('ALTER TABLE alunos AUTO_INCREMENT = 0 ');
           DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $cont = 0;

            foreach($arraydados as $aluno){

                $turma = Turma::checkTurma($aluno['turma'],$aluno['codcurso']);
                unset($aluno['turma']);
                unset($aluno['codcurso']);
                if($turma == false){ $turma = null; }
                $alunoc = Aluno::create($aluno);
                $alunoc->turma()->associate($turma)->save();
                Nota::regenerarNotas($alunoc->matricula,$alunoc->id);
                Aluno_ocorrencia::regenerarOcorrencias($alunoc->matricula,$alunoc->id);
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
