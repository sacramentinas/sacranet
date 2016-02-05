<?php

namespace Sacranet\Http\Requests;

use Sacranet\Http\Requests\Request;

class UsuarioRequest extends Request
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
        if($this->id) {
            return [
                'login' => 'required|min:4|unique:usuarios,login,' . $this->id,
                'nome' => 'required',
                'tipo' => 'required',
                'turmas' => 'required'
            ];
        }else{
            return [
                'login' => 'required|min:4|unique:usuarios,login,' . $this->id,
                'nome' => 'required',
                'tipo' => 'required',
                'senha' => 'required',
                'turmas' => 'required'
            ];
        }
    }
}
