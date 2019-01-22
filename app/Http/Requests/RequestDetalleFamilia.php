<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RequestDetalleFamilia extends FormRequest
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
        switch ($this->method()) {
	        case 'GET':
	        case 'DELETE':
		        return [];
	        case 'POST': {
	        	return [
                    'miembros_id' => [
                        'required',
                        Rule::exists('miembros', 'id'),
                        'unique:detalle_familia,miembros_id',
                        
                    ],
                    'familia_id' => [
                        'required',
                        Rule::exists('familia', 'id'),
                        
                    ],
	        	    'parentesco' => 'required|in:Esposa,Esposo,Hijo,Hija,Abuelo,Abuela,Padre,Madre,Hermano,Hermana,Cuñado,Suegra,Suegro,Otro',
		        ];
	        }
	        case 'PATCH': {                
                return [];;
            }
            case 'PUT': {                
                return [];
	        }
        }
    }
}


