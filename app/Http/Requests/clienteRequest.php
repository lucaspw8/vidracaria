<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clienteRequest extends FormRequest
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
            'nome'      => 'required|string|min:3|max:50',
            'cpf'       => 'min:11|max:11',
            'email'     => 'max:50',
            'telefone'  => 'nullable|numeric|min:9|max:9'
        ];
    }
    
    public function messages() {
        return [
            'nome.required'     =>  'O campo Nome é de preenchimento obrigatorio!',
            'nome.string'       =>  'O campo Nome deve conter somente letras',
            'nome.min'          =>  'O campo Nome deve conter no mínimo 3 caracteres!',
            'nome.max'          =>  'O campo Nome deve conter no máximo 50 caracteres!',
            'cpf.min'           =>  'O campo CPF deve conter 11 digitos!',
            'cpf.max'           =>  'O campo CPF deve conter 11 digitos!',
            'cpf.numeric'       =>  'O CPF deve ser numérico!',
            'email'             =>  'O campo Email deve conter no maximo 50 caracteres!',
            'telefone.numeric'  =>  'O campo Telefone deve conter somente numeros!',
            'telefone.min'      =>  'Telefoe possui 9 digitos!',
            'telefone.max'      =>  'Telefoe possui 9 digitos!',
        ];
    }
}
