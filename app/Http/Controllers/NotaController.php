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

           // set_time_limit(86000000);
            ini_set("memory_limit","7G");
            ini_set('max_execution_time', '0');
            ini_set('max_input_time', '0');
            set_time_limit(0);
            ignore_user_abort(true);
            $arraydados = [];


            $alunos = Aluno::select('id','matricula')->get()->toArray();
            $disciplinas = Disciplina::select('id','nome_sei')->get()->toArray();
            $dt = "";

            DB::connection()->disableQueryLog();



        if(count($alunos) > 0){
            $notas = $request->file('notas');
            $notas->move('upload','notas.txt');
            $arquivogravado = file('upload/notas.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);



            foreach($arquivogravado as $a) {

                $dados = explode(';', $a);

                if (count($dados) < 3) {
                    break;
                }

                foreach ($alunos as $i => $aluno) {
                        if ($dados[0] == $aluno['matricula']) {
                            $nota['aluno_id'] = $aluno['id'];
                            break;
                        }
                    }

                    foreach ($disciplinas as $i => $disciplina) {
                        if (trim($dados[4]) == $disciplina['nome_sei']) {
                            $nota['disciplina_id'] = $disciplina['id'];
                            break;
                        }
                    }



                    $nota['matricula'] = trim($dados[0]);
                    $nota['nota1unidade'] = (floatval($dados[5]) > 0 ? floatval($dados[5]) : " ");
                    $nota['nota2unidade'] = (floatval($dados[6]) > 0 ? floatval($dados[6]) : " ");
                    $nota['nota3unidade'] = (floatval($dados[7]) > 0 ? floatval($dados[7]) : " ");

                    if(isset($nota['aluno_id']) && isset($nota['disciplina_id'])){
                   // Nota::create($nota);
                        $dt .= implode(';',$nota).PHP_EOL;
                        array_push($arraydados,$nota);
                    }


                    $nota = [];

                }

           // DB::table('notas')->insert($arraydados);


           // Storage::disk('local')->put('notas.txt', $dt);
           $quantidade = count($arraydados);
            File::put('upload/notas.txt',$dt);


            if($quantidade){
                $msg =  ['sucesso' => "Arquivo Enviado com Sucesso"];
            }else{
                $msg = ['erro' => "Erro ao enviar o arquivo"];
            }



        }else{
            $msg = ['erro' => "Não existem alunos cadastrados no sistema"];
        }

            return response()->json($msg);
        }
    }

    public function salvar(){

        ini_set("memory_limit","7G");
        ini_set('max_execution_time', '0');
        ini_set('max_input_time', '0');
        set_time_limit(0);
        ignore_user_abort(true);
        DB::connection()->disableQueryLog();
        $arquivogravado = file('upload/notas.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $contador = 0;

        DB::table('notas')->delete();
        DB::statement('ALTER TABLE notas AUTO_INCREMENT = 0 ');

        foreach($arquivogravado as $a) {

            $dados = explode(';', $a);

            $nota['aluno_id'] = trim($dados[0]);
            $nota['disciplina_id'] = trim($dados[1]);
            $nota['matricula'] = trim($dados[2]);
            $nota['nota1unidade'] = (floatval($dados[3]) > 0 ? floatval($dados[3]) : " ");
            $nota['nota2unidade'] = (floatval($dados[4]) > 0 ? floatval($dados[4]) : " ");
            $nota['nota3unidade'] = (floatval($dados[5]) > 0 ? floatval($dados[5]) : " ");

            Nota::create($nota);
            $contador++;

        }


        if($contador){
            $msg =  ['sucesso' => "$contador alunos importados com sucesso!"];
        }else{
            $msg = ['erro' => "Erro ao importar! Nenhum aluno foi inserido"];
        }


        File::delete('upload/notas.txt');

        return response()->json($msg);


    }
}

