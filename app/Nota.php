<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
   protected $fillable = ['matricula','aluno_id','disciplina_id','nota1unidade','nota2unidade','nota3unidade'];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }


    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }



    public static function regenerarNotas($matricula,$aluno_id)
    {
        self::where('matricula',$matricula)->update(['aluno_id' => $aluno_id]);

    }


}
