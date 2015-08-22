<?php

namespace Sacranet\Http\Requests;

use Sacranet\Http\Requests\Request;

class TurmaRequest extends Request
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
            'cod_sei' => 'required|min:2|unique:series',
            'serie'   => 'required|unique:series',
            'turmas'  => 'required'
        ];
    }
}
