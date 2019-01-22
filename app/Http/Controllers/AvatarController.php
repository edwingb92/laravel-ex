<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avatar;

class AvatarController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource. pendiente por terminar-------------------------------
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $avatars=Avatar::orderBy('id','DESC')->get();
        return view('Avatar.index',compact('avatars')); 

    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombre'=>'required|unique:avatars,nombre']);
        Avatar::create($request->all());
        $notification = array(
            'message' => 'Registro creado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('Avatar.index')->with($notification);
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
       $this->validate($request,['nombre'=>'required|unique:profesion,nombre,'.$request->id]);
 
       Avatar::findOrFail($request->id)->update($request->all());

        $notification = array(
            'message' => 'Registro actualizado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('Avatar.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        dd($request);
        Avatar::findOrFail($request->id)->delete();

        $notification = array(
            'message' => 'Registro eliminado correctamente',
            'alert-type' => 'info'
        );
        return redirect()->route('Avatar.index')->with($notification);
    }
}
