<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestArticulo;
use App\Articulo;
use App\Helpers\Helper;


class ArticuloController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos=Articulo::orderBy('nombre')->get();

        return view('Articulo.index',compact('articulos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulo = new Articulo;
		$btnText = __("Guardar");

        return view('Articulo.create',compact('articulo','btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestArticulo $articulorequest)
    {  

        if($articulorequest->hasFile('fotoarticulo')) {
			$fotoarticulo = Helper::uploadFile( "fotoarticulo", 'public');
			$articulorequest->merge(['fotoarticulo' => $fotoarticulo]);
		}
		
		Articulo::create($articulorequest->input());        
        $notification = array(
            'message' => 'Registro creado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('Articulos.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $articulo=Articulo::findorFail($id);
       
        return view('Articulo.show',compact('articulo')); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
        $btnText = __("Actualizar");
        return view('Articulo.create', compact('articulo', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestArticulo $articulorequest,$id)
    {
        $articulo = Articulo::findOrFail($id);

        if($articulorequest->hasFile('fotoarticulo')) 
        {
            if(!empty($articulo->fotoarticulo))
            {
                \Storage::delete('public/'.$articulo->fotoarticulo);
            }
        
            $fotoarticulo = Helper::uploadFile( "fotoarticulo", 'public');
			
			$articulorequest->merge(['fotoarticulo' => $fotoarticulo]);
		}

		$articulo->fill($articulorequest->input())->save();

  
        $notification = array(
            'message' => 'Registro actualizado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('Articulos.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        try {
            Articulo::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Registro eliminado correctamente',
                'alert-type' => 'info'
            );
            return redirect()->route('Articulos.index')->with($notification);

		} catch (\Exception $exception) {
            $notification = array(
                'message' => 'Eror eliminado registro',
                'alert-type' => 'danger'
            );
			return back()->with($notification);
		}

    }
}

