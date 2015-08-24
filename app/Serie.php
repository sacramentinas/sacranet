<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;


class Serie extends Model
{
    protected $fillable = ['cod_sei','serie'];

    public function turmas()
    {
        return $this->hasMany('Sacranet\Turma');
    }
}
