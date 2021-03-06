<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class acessorioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'tipo'          =>  'required|string',
           'valorCompra'   =>  'required|numeric',
           'valorVenda'    =>  'required|numeric',
           
        ];
    }
    
    public function messages() {
        return[
            'nome.required'        => 'Tipo é obrigatório!',
            'nome.string'          => 'Tipo deve conter apenas letras!',
            'valorCompra.required' => 'Necessario informar um valor compra',
            'valorCompra.numeric'  => 'Valor compra deve ser numérico!',
            'valorVenda.required'  => 'Deve-se informar um valor de venda!',
            'valorVenda.numeric'   => 'Valor de venda deve ser numérico'
        ];
    }
}
