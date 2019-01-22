<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RequestObservacion extends FormRequest
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
                        
                    ],
                    'users_id' => [
                        'required',
                        Rule::exists('miembros', 'id'),
                        
                    ],
	        	    'nombre' => 'required|min:3|max:30',
                    'fecha' => 'required|date_format:"Y-m-d"',
                    'descripcion' => 'required|min:7',
		        ];
	        }
	        case 'PATCH': {                
                return [
                    'miembros_id' => [
                        'required',
                        Rule::exists('miembros', 'id'),
                        
                    ],
                    'users_id' => [
                        'required',
                        Rule::exists('miembros', 'id'),
                        
                    ],
	        	    'nombre' => 'required|min:3|max:30',
                    'fecha' => 'required|date_format:"Y-m-d"',
                    'descripcion' => 'required|min:7',
		        ];
            }
            case 'PUT': {                
                return [
                    'miembros_id' => [
                        'required',
                        Rule::exists('miembros', 'id'),
                        
                    ],
                    'users_id' => [
                        'required',
                        Rule::exists('miembros', 'id'),
                        
                    ],
	        	    'nombre' => 'required|min:3|max:30',
                    'fecha' => 'required|date_format:"Y-m-d"',
                    'descripcion' => 'required|min:7|max:191',
		        ];
	        }
        }
    }
}


