<?php

namespace Sacranet\Http\Requests;

use Sacranet\Http\Requests\Request;

class OcorrenciaRequest extends Request
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

           'unidade'       => 'required',
           'data'          => 'required',
           'descricao'     => 'required_without:ocorrencia',
           'ocorrencia'    => 'required_without:descricao',
           'alunos'         => 'required',
           'disciplina_id' => 'required',
        ];
    }
}
