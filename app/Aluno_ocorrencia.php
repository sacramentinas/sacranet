<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;

class Aluno_ocorrencia extends Model
{
    protected $softDelete = true;

    public static function regenerarOcorrencias($matricula,$aluno_id)
    {
        self::where('matricula',$matricula)->update(['aluno_id' => $aluno_id]);

    }

}
