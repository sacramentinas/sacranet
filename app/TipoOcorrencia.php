<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;

class TipoOcorrencia extends Model
{
    protected $fillable = ['descricao','tipo'];
    protected $softDelete = true;

    public function ocorrencias()
    {
        return $this->belongsToMany('Sacranet\Ocorrencia','ocorrencia_tipo_ocorrencias')->withTimestamps();
    }



}
