<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class kitboxRequest extends FormRequest
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
           'metragem'      =>  'required|numeric',
          
           
        ];
    }
    
    public function messages() {
        return[
            'metragem.required'    => 'Metragem é obrigatório!',
            'metragem.numeric'     => 'Metragem é numerico!',    
        ];
    }
}
