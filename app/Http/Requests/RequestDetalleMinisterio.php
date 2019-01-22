<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RequestDetalleMinisterio extends FormRequest
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
                        Rule::unique('detalle_ministerio','miembros_id')->where(function ($query) {
                            return $query->where('roles_id',$this->roles_id);
                        })                       
                    ],
                    'ministerio_id' => [
                        'required',
                        Rule::exists('ministerio', 'id'),
                        
                    ],
                    'roles_id' => [
                        'required',
                        Rule::exists('roles', 'id'),
                        
                    ],
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


