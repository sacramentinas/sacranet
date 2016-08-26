<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nota extends Model
{
   protected $fillable = ['aluno_id','disciplina_id','nota1unidade','nota2unidade','nota3unidade'];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }


    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
    
    public static function geraDados($arquivogravado,$disciplinas)
    {
        $arraydados = [];
        $nota = [];
        foreach($arquivogravado as $a) {

                $dados = explode(';', $a);

                    if (count($dados) < 3) {
                        break;
                    }

                    // Busca o Id da Disciplina Para cada NOTA
                    foreach ($disciplinas as $i => $disciplina) {
                           if (trim($dados[4]) == $disciplina['nome_sei']) {
                               $nota['disciplina_id'] = $disciplina['id'];
                               break;
                           }
                    }


                    $nota['aluno_id'] = trim($dados[0]);
                    $nota['nota1unidade'] = (floatval($dados[5]) > 0 ? floatval($dados[5]) : " ");
                    $nota['nota2unidade'] = (floatval($dados[6]) > 0 ? floatval($dados[6]) : " ");
                    $nota['nota3unidade'] = (floatval($dados[7]) > 0 ? floatval($dados[7]) : " ");

                    if(isset($nota['aluno_id']) && isset($nota['disciplina_id'])){
                        array_push($arraydados,$nota);
                    }


                    $nota = []; // Esvazia o Array Nota

        }
        return $arraydados;
    }
    
    public static function gravar($arraydados)
    {
           DB::table('notas')->delete();
           DB::statement('ALTER TABLE notas AUTO_INCREMENT = 0 ');
           $dados = array_chunk($arraydados,200);
           
           foreach($dados as $notas){
              DB::table('notas')->insert($notas);
           }

    }


}
