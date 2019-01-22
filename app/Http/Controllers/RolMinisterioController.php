<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestRolMinisterio;
use App\RolMinisterio;

class RolMinisterioController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

 
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestRolMinisterio $requesterolministerio)
    {
        RolMinisterio::create($requesterolministerio->all());
        $notification = array(
            'message' => 'Registro creado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestRolMinisterio $requesterolministerio)
    {
       RolMinisterio::findOrFail($requesterolministerio->id)->update($requesterolministerio->all());

        $notification = array(
            'message' => 'Registro actualizado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        RolMinisterio::findOrFail($request->id)->delete();

        $notification = array(
            'message' => 'Registro eliminado correctamente',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
