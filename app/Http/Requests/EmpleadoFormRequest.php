<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoFormRequest extends FormRequest
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
            'idcargo'=>'required',
            'cedula'=>'required|numeric',
            'nombre'=>'required|max:45',
            'apellido'=>'required|max:45',
            'direccion'=>'required|max:100',
            'telefono'=>'required|numeric',
            'correo'=>'required|max:45',
            'image' => 'mimes:jpeg,png',
        ];
    }
}
