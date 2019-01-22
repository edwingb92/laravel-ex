<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RequestMinisterio extends FormRequest
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
                    'nombre' => 'required|min:3|max:30|unique:ministerio,nombre',
                    'descripcion' => 'required|min:5',
                    'fotoministerio' => 'sometimes|image|mimes:jpg,jpeg,png,gif',
		        ];
	        }
	        case 'PATCH': {                
                return [
                    'nombre' => 'required|min:3|max:30|unique:ministerio,nombre,'.$this->id.',id',
                    'descripcion' => 'required|min:5',
                    'fotoministerio' => 'sometimes|image|mimes:jpg,jpeg,png,gif',
		        ];
            }
            case 'PUT': {                
                return [
                    'nombre' => 'required|min:3|max:30|unique:ministerio,nombre,'.$this->id.',id',
                    'descripcion' => 'required|min:7',
                    'fotoministerio' => 'sometimes|image|mimes:jpg,jpeg,png,gif',
		        ];
	        }
        }
    }
}


