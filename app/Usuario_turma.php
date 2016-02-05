<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;

class Usuario_turma extends Model
{
    public function usuario()
    {
        return $this->hasOne(Usuario::class);
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
}
