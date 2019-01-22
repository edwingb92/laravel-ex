<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestMinisterio;
use App\Ministerio;
use App\DetalleMinisterio;
use App\Miembro;
use App\Helpers\Helper;

class MinisterioController extends Controller
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
    public function index(Request $request)
    {
        $nombre=$request->get('nombreb');

        $ministerios=Ministerio::orderBy('nombre')->nombre($nombre)->get();

        return view('Ministerio.index',compact('ministerios')); 

    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestMinisterio $ministeriorequest)
    {
       
        if($ministeriorequest->hasFile('fotoministerio')) {            
            $fotoministerio = Helper::uploadFile( "fotoministerio", 'public');
           
            $ministeriorequest->merge(['fotoministerio' => $fotoministerio]);
            
		}
        Ministerio::create($ministeriorequest->input());
        
        $notification = array(
            'message' => 'Registro creado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('Ministerio.index')->with($notification);


      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $miembros = Miembro::with('avatars')->get();
   /** Se puede mejorar porque se están haciendo dos consultas */
        $miembrosd= Miembro::with('detalleministerio')->whereHas('detalleministerio', function ($query) use ($id) {
            $query->where('ministerio_id',$id);
        })->get();

       $ministerio=Ministerio::findorFail($id);
       $detallesministerio=DetalleMinisterio::where('ministerio_id',$id)->with('miembro')->get();
       return view('Ministerio.show',compact('ministerio','detallesministerio','miembros','miembrosd')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestMinisterio $ministeriorequest)
    {
        $ministerio = Ministerio::findOrFail($ministeriorequest->id);

        if($ministeriorequest->hasFile('fotoministerio')) 
        {
            if(!empty($ministerio->fotoministerio))
            {
                \Storage::delete('public/'.$ministerio->fotoministerio);
            }
        
            $fotoministerio = Helper::uploadFile( "fotoministerio", 'public');
			
			$ministeriorequest->merge(['fotoministerio' => $fotoministerio]);
		}

		$ministerio->fill($ministeriorequest->input())->save();

        $notification = array(
            'message' => 'Registro actualizado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('Ministerio.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Ministerio::findOrFail($request->id)->delete();

        $notification = array(
            'message' => 'Registro eliminado correctamente',
            'alert-type' => 'info'
        );
        return redirect()->route('Ministerio.index')->with($notification);
    }
}
