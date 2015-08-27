<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;


class Turma extends Model
{
    protected $fillable = ['letra'];


    public function serie(){

        return $this->belongsTo('Sacranet\Serie');

    }

}
