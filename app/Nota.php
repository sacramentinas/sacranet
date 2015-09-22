<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
   protected $fillable = ['matricula','aluno_id','disciplina_id','nota1unidade','nota2unidade','nota3unidade'];


    public static function regenerarNotas($matricula,$aluno_id)
    {

        self::where('matricula',$matricula)->update(['aluno_id' => $aluno_id]);


    }

    public function aluno()
    {
        return $this->belongsTo('Sacranet\Aluno');
    }

    public function disciplina()
    {
        return $this->belongsTo('Sacranet\Disciplina');
    }

}
