<?php

namespace Sacranet\Http\Requests;

use Sacranet\Http\Requests\Request;

class AlunoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nomealuno'         =>      'required|unique:alunos,nomealuno,'.$this->id,
            'matricula'         =>      'required|unique:alunos,matricula,'.$this->id,
            'datanascimento'    =>      'required',
            'sexo'              =>      'required',
            'numero'            =>      'required',
            'turma_id'          =>      'required',
            'senhatexto'        =>      'required',

        ];
    }
}
