<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RequestEclesial extends FormRequest
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
	        	    'fechaingreso' => 'required|date_format:"Y-m-d"',
                    'iglesiaanterior' => 'nullable|min:3',
                    'fechaconversion' => 'nullable|date_format:"Y-m-d"',
                    'bautizado' => 'required|in:1,0',
			        'fechabautismo' => 'nullable|date_format:"Y-m-d"',
                    'iglesiabautismo' => 'nullable|min:3',
		        ];
	        }
	        case 'PATCH': {                
                return [
                    
	        	    'miembros_id' => [
                        'required',
                        Rule::exists('miembros', 'id'),
                        
                    ],
	        	    'fechaingreso' => 'required|date_format:"Y-m-d"',
                    'iglesiaanterior' => 'nullable|min:3',
                    'fechaconversion' => 'nullable|date_format:"Y-m-d"',
                    'bautizado' => 'required|boolean',
			        'fechabautismo' => 'nullable|date_format:"Y-m-d"',
                    'iglesiabautismo' => 'nullable|min:3',
		        ];
            }
            case 'PUT': {                
                return [
                    
	        	    'miembros_id' => [
                        'required',
                        Rule::exists('miembros', 'id'),
                        
                    ],
	        	    'fechaingreso' => 'required|date_format:"Y-m-d"',
                    'iglesiaanterior' => 'nullable|min:3',
                    'fechaconversion' => 'nullable|date_format:"Y-m-d"',
                    'bautizado' => 'required|in:1,0',
			        'fechabautismo' => 'nullable|date_format:"Y-m-d"',
                    'iglesiabautismo' => 'nullable|min:3',
		        ];
	        }
        }
    }
}


