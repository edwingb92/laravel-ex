<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoCivil;

class EstadoCivilController extends Controller
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
        $estadosciviles=EstadoCivil::orderBy('id','DESC')->get();
        return view('EstadoCivil.index',compact('estadosciviles')); 

    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombre'=>'required|unique:estadocivil,nombre']);
        EstadoCivil::create($request->all());
        $notification = array(
            'message' => 'Registro creado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('EstadoCivil.index')->with($notification);
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
       $this->validate($request,['nombre'=>'required|unique:estadocivil,nombre,'.$request->id]);
 
       EstadoCivil::findOrFail($request->id)->update($request->all());

        $notification = array(
            'message' => 'Registro actualizado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('EstadoCivil.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        EstadoCivil::findOrFail($request->id)->delete();

        $notification = array(
            'message' => 'Registro eliminado correctamente',
            'alert-type' => 'info'
        );
        return redirect()->route('EstadoCivil.index')->with($notification);
    }
}
