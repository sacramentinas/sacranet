<?php

namespace Sacranet\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
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

            set_time_limit(36000000);
            $arraydados = [];


            $alunos = Aluno::select('id','matricula')->get()->toArray();
            $disciplinas = Disciplina::select('id','nome_sei')->get()->toArray();






        if(count($alunos) > 0){
            $notas = $request->file('notas');
            $notas->move('upload','notas.txt');
            $arquivogravado = file('upload/notas.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            DB::table('notas')->delete();
            DB::statement('ALTER TABLE notas AUTO_INCREMENT = 0 ');

            foreach($arquivogravado as $a) {

                $dados = explode(',', $a);

                if (count($dados) < 3) {
                    break;
                }

                foreach ($alunos as $i => $aluno) {
                        if ($dados[0] == $aluno['matricula']) {
                            $nota['aluno_id'] = $aluno['id'];
                            unset($aluno[$i]);
                            break;
                        }
                    }

                    foreach ($disciplinas as $i => $disciplina) {
                        if (trim($dados[4]) == $disciplina['nome_sei']) {
                            $nota['disciplina_id'] = $disciplina['id'];
                            break;
                        }
                    }
                    $nota['matricula'] = $dados[0];
                    $nota['nota1unidade'] = floatval($dados[5]);
                    $nota['nota2unidade'] = (floatval($dados[6]) > 0 ? floatval($dados[6]) : NULL);
                    $nota['nota3unidade'] = (floatval($dados[7]) > 0 ? floatval($dados[7]) : NULL);

                    Nota::create($nota);

                    array_push($arraydados, $nota);
                    $nota = [];

                }


           $quantidade = count($arraydados);

            if($quantidade){
                $msg =  ['sucesso' => "$quantidade notas importadas com sucesso"];
            }else{
                $msg = ['erro' => "Nenhuma nota pôde ser importada"];
            }



        }else{
            $msg = ['erro' => "Não existem alunos cadastrados no sistema"];
        }

            return response()->json($msg);
        }
    }
}

