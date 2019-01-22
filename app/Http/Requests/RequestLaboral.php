<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RequestLaboral extends FormRequest
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
	        	    'lugar' => 'required|min:3|max:30',
                    'direccion' => 'nullable|min:3|max:30',
                    'telefono' => 'nullable|min:7|max:15',
		        ];
	        }
	        case 'PATCH': {                
                return [
                    
	        	    'miembros_id' => [
                        'required',
                        Rule::exists('miembros', 'id'),
                        
                    ],
                    'lugar' => 'required|min:3|max:30',
                    'direccion' => 'nullable|min:3|max:30',
                    'telefono' => 'nullable|min:7|max:15',
		        ];
            }
            case 'PUT': {                
                return [
                    
	        	    'miembros_id' => [
                        'required',
                        Rule::exists('miembros', 'id'),
                        
                    ],
                    'lugar' => 'required|min:3|max:30',
                    'direccion' => 'nullable|min:3|max:30',
                    'telefono' => 'nullable|min:7|max:15',
		        ];
	        }
        }
    }
}


