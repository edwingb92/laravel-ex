<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlmacenInventario;

class AlmacenInventarioController extends Controller
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
        $almacenesinventario=AlmacenInventario::orderBy('id','DESC')->get();
        return view('AlmacenInventario.index',compact('almacenesinventario')); 

    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombre'=>'required|unique:almacen_inventario,nombre']);
        AlmacenInventario::create($request->all());
        $notification = array(
            'message' => 'Registro creado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('AlmacenInventario.index')->with($notification);
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
       $this->validate($request,['nombre'=>'required|unique:almacen_inventario,nombre,'.$request->id]);
 
       AlmacenInventario::findOrFail($request->id)->update($request->all());

        $notification = array(
            'message' => 'Registro actualizado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('AlmacenInventario.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        AlmacenInventario::findOrFail($request->id)->delete();

        $notification = array(
            'message' => 'Registro eliminado correctamente',
            'alert-type' => 'info'
        );
        return redirect()->route('AlmacenInventario.index')->with($notification);
    }
}
