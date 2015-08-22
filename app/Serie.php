<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;
use Sacranet\Turma;

class Serie extends Model
{
    protected $fillable = ['cod_sei','serie'];

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}
