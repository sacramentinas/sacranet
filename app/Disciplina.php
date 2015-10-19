<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = ['descricao','nome_sei'];

    public function disciplina()
    {
        return $this->hasMany(Nota::class);
    }



}
