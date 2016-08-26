<?php

namespace Sacranet\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Sacranet\Aluno;
use Sacranet\Disciplina;
use Sacranet\Http\Requests;
use Sacranet\Http\Controllers\Controller;
use Sacranet\Nota;

class NotaController extends Controller
{
   public function importar()
   {
       return view('notas.importar');
   }

    public function upload(Request $request)
    {
        if($request->hasFile('notas'))
        {

            ini_set("memory_limit","7G");
            ini_set('max_execution_time', '0');
            ini_set('max_input_time', '0');
            set_time_limit(0);
            ignore_user_abort(true);
            DB::connection()->disableQueryLog();

           
            $disciplinas = Disciplina::select('id','nome_sei')->get()->toArray();
           

            $notas = $request->file('notas');
            $notas->move('upload','notas.txt');
            $arquivogravado = file('upload/notas.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $arraydados = Nota::geraDados($arquivogravado,$disciplinas);
            Nota::gravar($arraydados);
            $quantidade = count($arraydados);
           

            if($quantidade){
                $msg =  ['sucesso' => "{$quantidade} Notas Importadas com Sucesso"];
            }else{
                $msg = ['erro' => "Erro ao Importar o arquivo"];
            }

        
            File::delete('upload/notas.txt');
            return response()->json($msg);
        }
    }

}

