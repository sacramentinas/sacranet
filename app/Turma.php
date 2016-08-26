<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;


class Turma extends Model
{
    protected $fillable = ['letra'];
    protected static $arrayTurma = [];

    public function serie(){

        return $this->belongsTo('Sacranet\Serie');

    }

    public function alunos()
    {
        return $this->hasMany('Sacranet\Aluno');
    }

    public static function getTurma(){

       SELF::$arrayTurma =  Self::with(['serie' => function($query){
            $query->select('id','cod_sei');
        }
        ])->get()->toArray();

    }

    public static function checkTurma($turma,$serie)
    {
        $turmas = SELF::$arrayTurma;

        foreach($turmas as $t){
            if($t['letra'] == $turma && $t['serie']['cod_sei'] == $serie ){
                return $t['id'];
            }
        }

        return null;

    }

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class,'usuario_turmas');
    }


}
