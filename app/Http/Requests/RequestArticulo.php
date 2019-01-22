<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RequestArticulo extends FormRequest
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
                    'modelo' => 'nullable|min:3',
                    'serie' => 'nullable|min:3',
                    'cantidad' => 'required|numeric',
                    'preciounitario' => 'nullable|numeric|min:3|max:999999999999',
                    'preciototal' => 'nullable|numeric|min:3|max:999999999999',
                    'factura' => 'nullable|min:3',
                    'fechacompra' => 'nullable|date_format:"Y-m-d"',
			        'almacen_id' => [
                        'nullable',
                        Rule::exists('almacen_inventario', 'id'),
                        
                    ],
                    'categoria_id' => [
                        'nullable',
                        Rule::exists('categoria_inventario', 'id'),
                        
                    ],
                    'descripcion' => 'nullable|min:5',                    
                    'fotoarticulo' => 'sometimes|image|mimes:jpg,jpeg,png',
                    'estado' => 'required|boolean',
		        ];
	        }
	        case 'PUT': {
                return [
	        	    'nombre' => 'required|min:3',
                    'modelo' => 'nullable|min:3',
                    'serie' => 'nullable|min:3',
                    'cantidad' => 'required|numeric',
                    'preciounitario' => 'nullable|numeric|min:3|max:999999999999',
                    'preciototal' => 'nullable|numeric|min:3|max:999999999999',
                    'factura' => 'nullable|min:3',
                    'fechacompra' => 'nullable|date_format:"Y-m-d"',
			        'almacen_id' => [
                        'nullable',
                        Rule::exists('almacen_inventario', 'id'),
                        
                    ],
                    'categoria_id' => [
                        'nullable',
                        Rule::exists('categoria_inventario', 'id'),
                        
                    ],
                    'descripcion' => 'nullable|min:5',                    
                    'fotoarticulo' => 'sometimes|image|mimes:jpg,jpeg,png',
                    'estado' => 'required|boolean',
		        ];
	        }
        }
    }
}


