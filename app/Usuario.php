<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Usuario extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $fillable = ['nome','login','senha','tipo'];


    public function getAuthPassword() {
        return $this->senha;
    }

    public function turmas()
    {
        return $this->belongsToMany(Turma::class,'usuario_turmas');
    }

    public function ocorrencias()
    {
        return $this->hasMany(Ocorrencia::class);
    }
    public function setSenhaAttribute($value)
    {

            $this->attributes['senha'] = \Hash::make($value);

    }
}
