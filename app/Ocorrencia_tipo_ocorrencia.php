<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia_tipo_ocorrencia extends Model
{
    protected $softDelete = true;

    public function tipo()
    {
        return $this->hasOne(TipoOcorrencia::class);
    }

    public function ocorrencia()
    {
        return $this->belongsTo(Ocorrencia::class);
    }
}
