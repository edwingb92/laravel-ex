<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RequestMiembro extends FormRequest
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
	        	    'nombre' => 'required|min:3',
                    'apellido1' => 'required|min:3',
                    'apellido2' => 'nullable|min:3',
                    'genero' => 'required',
			        'tipodocumento_id' => [
                        'nullable',
                        'required_with:numerodocumento',
                        Rule::exists('tipodocumento', 'id'),
                        
                    ],
                    'numerodocumento' => 'nullable|min:5|required_with:tipodocumento_id',
                    'fechanacimiento' => 'nullable|date_format:"Y-m-d"',
                    'lugarnacimiento' => 'nullable|min:3',
                    'nacionalidad' => 'nullable|min:3',
                    'email' => 'nullable|unique:miembros,email',
                    'telefono' => 'nullable|min:7',
                    'celular' => 'required|min:10',
                    'departamento' => 'nullable|min:3|required_with:municipio',
                    'municipio' => 'nullable|min:3',
                    'direccion' => 'required|min:5',
                    'codigopostal' => 'nullable|min:5|max:10',
                    'genero' => 'required|min:1|max:1',
                    'profesion_id' => [
			        	'nullable',
				        Rule::exists('profesion', 'id'),
                    ],
                    'tipopersona_id' => [
			        	'required',
				        Rule::exists('tipopersona', 'id'),
                    ],
                    'clasificacionsocial_id' => [
			        	'required',
				        Rule::exists('clasificacionsocial', 'id'),
                    ],
                    'estadocivil_id' => [
			        	'nullable',
				        Rule::exists('estadocivil', 'id'),
                    ],
                    'estadomembresia_id' => [
			        	'required',
				        Rule::exists('estadomembresia', 'id'),
                    ],
                    'fotoperfil' => 'sometimes|image|mimes:jpg,jpeg,png',
                    'avatars_id' => [
			        	'required',
				        Rule::exists('avatars', 'id'),
                    ],
		        ];
	        }
	        case 'PUT': {
                return [
	        	    'nombre' => 'required|min:3',
                    'apellido1' => 'required|min:3',
                    'apellido2' => 'nullable|min:3',
                    'genero' => 'required',
			        'tipodocumento_id' => [
                        'nullable',
                        'required_with:numerodocumento',
                        Rule::exists('tipodocumento', 'id'),
                        
                    ],
                    'numerodocumento' => 'nullable|min:5|required_with:tipodocumento_id',
                    'fechanacimiento' => 'nullable|date_format:"Y-m-d"',
                    'lugarnacimiento' => 'nullable|min:3',
                    'nacionalidad' => 'nullable|min:3',
                    'email' => 'nullable|unique:miembros,email,'.$this->id.',id',
                    'telefono' => 'nullable|min:7',
                    'celular' => 'required|min:10',
                    'departamento' => 'nullable|min:3|required_with:municipio',
                    'municipio' => 'nullable|min:3',
                    'direccion' => 'required|min:5',
                    'codigopostal' => 'nullable|min:5|max:10',
                    'genero' => 'required|min:1|max:1',
                    'profesion_id' => [
			        	'nullable',
				        Rule::exists('profesion', 'id'),
                    ],
                    'tipopersona_id' => [
			        	'required',
				        Rule::exists('tipopersona', 'id'),
                    ],
                    'clasificacionsocial_id' => [
			        	'required',
				        Rule::exists('clasificacionsocial', 'id'),
                    ],
                    'estadocivil_id' => [
			        	'nullable',
				        Rule::exists('estadocivil', 'id'),
                    ],
                    'estadomembresia_id' => [
			        	'required',
				        Rule::exists('estadomembresia', 'id'),
                    ],
                    'fotoperfil' => 'sometimes|image|mimes:jpg,jpeg,png',
                    'avatars_id' => [
			        	'required',
				        Rule::exists('avatars', 'id'),
                    ],
		        ];
	        }
        }
    }
}


