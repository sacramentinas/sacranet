<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Aluno extends Model
{


    protected $fillable = ['matricula','nomealuno','datanascimento','sexo','turma_id','numero','endereco',
                           'bairro','cep','municipio','nomemae','nomepai','senha','senhatexto','telefone','telefonemae','telefonepai',
                           'emailmae','emailpai','emailcontratante' ];

    protected $dates = ['datanascimento'];


    public function getDatanascimentoAttribute($valor)
    {
       // return Carbon::parse($this->attributes['datanascimento'])->format("d/m/Y");
       return $this->attributes['datanascimento'];

    }


    public function turma()
    {
        return $this->belongsTo('Sacranet\Turma');
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }


    public function ocorrencias()
    {
        return $this->belongsToMany('Sacranet\Ocorrencia','aluno_ocorrencias')->withTimestamps();
    }


    public function setSenhatextoAttribute($value)
    {
        $this->attributes['senhatexto'] = $value;
        $this->attributes['senha'] = \Hash::make($value);
    }

    public function setMatriculaAttribute($value)
    {
        $this->attributes['matricula'] = intval($value);
    }


     public static function geradados($arquivo)
     {

         $arraydados = [];
         $dados = [];
         $arquivogravado = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);


         foreach($arquivogravado as $a){
             if(substr($a,0,4) == "----"){
                 $quant = explode(" ",$a);
                 break;
             }

         }

         if(isset($quant) and $quant > 0){


         $cont = 0;
         while($cont < count($quant)){

             $quant[$cont] .= "-";
             $cont++;
         }



         foreach($arquivogravado as $a){

             if(!(substr($a,0,15) == "MATRIC ALUNO(A)" || substr($a,0,4) == "----" || substr($a,0,15) == "Quantidade de a" || substr($a,0,6) == "ATIVOS" ))
             {
                 $ini = 0;
                 $dados['matricula'] = trim(substr($a,$ini,strlen($quant[0]) ) );
                 $dados['nomealuno'] = trim(substr($a,$ini += strlen($quant[0]) ,strlen($quant[1])));
                 $data =  explode("/",trim(substr($a,$ini += strlen($quant[1]) ,strlen($quant[2]))));

                 if(is_array($data) and count($data) == 3){
                     $dados['datanascimento'] = Carbon::createFromDate($data[2], $data[1], $data[0])->format('Y-m-d');
                 }else{
                     $dados['datanascimento'] = null;
                 }

                 $dados['sexo'] = trim(substr($a,$ini += strlen($quant[2]) ,strlen($quant[3])));
                 // $dados['senhaaluno'] = trim(substr($a,$ini += strlen($quant[3]) ,strlen($quant[4])));
                 $ini += strlen($quant[3]);
                 $ini += strlen($quant[4]);
                 $dados['codcurso'] = trim(substr($a,$ini += strlen($quant[5]) ,strlen($quant[6])));
                 $ini += strlen($quant[6]);
                 $dados['turma'] = trim(substr($a,$ini += strlen($quant[7]) ,strlen($quant[8])));
                 $dados['numero'] = trim(substr($a,$ini += strlen($quant[8]) ,strlen($quant[9])));
                 $dados['endereco'] = trim(substr($a,$ini += strlen($quant[9]) ,strlen($quant[10])));
                 $dados['bairro'] = trim(substr($a,$ini += strlen($quant[10]) ,strlen($quant[11])));
                 $dados['cep'] = trim(substr($a,$ini += strlen($quant[11]) ,strlen($quant[12])));
                 $dados['municipio'] = trim(substr($a,$ini += strlen($quant[12]) ,strlen($quant[13])));
                 $dados['nomemae'] = trim(substr($a,$ini += strlen($quant[13]) ,strlen($quant[14])));
                 $dados['nomepai'] = trim(substr($a,$ini += strlen($quant[14]) ,strlen($quant[15])));
                 $dados['senhatexto'] =  trim(substr($a,$ini += strlen($quant[15]) ,strlen($quant[16])));
                 $dados['telefone'] = trim(substr($a,$ini += strlen($quant[16]) ,strlen($quant[17])));
                 $dados['telefonemae'] = trim(substr($a,$ini += strlen($quant[17]) ,strlen($quant[18])));
                 $dados['telefonepai'] = trim(substr($a,$ini += strlen($quant[18]) ,strlen($quant[19])));
                 $dados['emailmae'] = trim(substr($a,$ini += strlen($quant[19]) ,strlen($quant[20])));
                 $dados['emailpai'] = trim(substr($a,$ini += strlen($quant[20]) ,strlen($quant[21])));
                 $dados['emailcontratante'] = trim(substr($a,$ini += strlen($quant[21])));


                 array_push($arraydados,$dados);
             }




         }
          return $arraydados ;

         }else{
          return [];
         }

     }
}
