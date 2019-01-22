<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClasificacionSocial;

class ClasificacionSocialController extends Controller
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
        $clasificacionessociales=ClasificacionSocial::orderBy('id','DESC')->get();
        return view('ClasificacionSocial.index',compact('clasificacionessociales')); 
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombre'=>'required|unique:clasificacionsocial,nombre']);
        ClasificacionSocial::create($request->all());
        $notification = array(
            'message' => 'Registro creado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('ClasificacionSocial.index')->with($notification);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request,['nombre'=>'required|unique:clasificacionsocial,nombre,'.$request->id]);
 
        ClasificacionSocial::findOrFail($request->id)->update($request->all());

        $notification = array(
            'message' => 'Registro actualizado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('ClasificacionSocial.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        ClasificacionSocial::findOrFail($request->id)->delete();

        $notification = array(
            'message' => 'Registro eliminado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('ClasificacionSocial.index')->with($notification);
    }
}
