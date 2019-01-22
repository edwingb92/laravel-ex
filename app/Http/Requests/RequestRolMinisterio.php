<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RequestRolMinisterio extends FormRequest
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
                    'ministerio_id' => [
                        'required',
                        Rule::exists('ministerio', 'id'),
                        
                    ],
                    'nombre' => Rule::unique('roles','nombre')->where(function ($query) {
                        return $query->where('ministerio_id',$this->ministerio_id);
                    }) 
		        ];
	        }
	        case 'PATCH': {                
                return [
                    'ministerio_id' => [
                        'required',
                        Rule::exists('ministerio', 'id'),
                        
                    ],
	        	    'nombre' => Rule::unique('roles','nombre')->where(function ($query) {
                        return $query->where('ministerio_id',$this->ministerio_id);
                    })->ignore($this->id)
		        ];
            }
            case 'PUT': {                
                return [
                    'ministerio_id' => [
                        'required',
                        Rule::exists('ministerio', 'id'),
                        
                    ],
	        	    'nombre' =>  Rule::unique('roles','nombre')->where(function ($query) {
                        return $query->where('ministerio_id',$this->ministerio_id);
                    })->ignore($this->id) 
		        ];
	        }
        }
    }
}


