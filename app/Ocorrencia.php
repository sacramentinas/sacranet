<?php

namespace Sacranet;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    protected $fillable = ['disciplina_id','turma_id','unidade','descricao','data'];
    protected $dates = ['data'];

    public function getDataAttribute($data)
    {
        $dt = new Carbon($data);
        return $dt->format('Y-m-d');

    }
    public function unidadeConverte()
    {
        if($this->attributes['unidade'] == 1){
            return "I Unidade";
        }else if($this->attributes['unidade'] == 2){
            return "II Unidade";
        }else{
            return "III Unidade";
        }
    }

    public function turma()
    {
        return $this->belongsTo('Sacranet\Turma');
    }

    public function disciplina()
    {
        return $this->belongsTo('Sacranet\Disciplina');
    }

    public function alunos()
    {
        return $this->belongsToMany('Sacranet\Aluno','aluno_ocorrencias')->withTimestamps();
    }

    public function tipoocorrencias()
    {
        return $this->belongsToMany('Sacranet\TipoOcorrencia','ocorrencia_tipo_ocorrencias')->withTimestamps();
    }


}
