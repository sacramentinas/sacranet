<?php

namespace Sacranet;

use Illuminate\Database\Eloquent\Model;
use Sacranet\Serie;

class Turma extends Model
{
    protected $fillable = ['serie_id','turma'];


    public function serie(){

        return $this->belongsTo(Serie::class);

    }

}
