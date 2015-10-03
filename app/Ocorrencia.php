<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    protected $fillable = ['disciplina_id','turma_id','unidade','descricao','data'];
    protected $dates = ['data'];

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
        return $this->belongsToMany('Sacranet\Aluno','aluno_ocorrencias');
    }


}
