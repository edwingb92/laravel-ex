<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestEclesial;
use App\Eclesial;

class EclesialController extends Controller
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
    public function store(RequestEclesial $requesteclesial)
    {
        Eclesial::create($requesteclesial->all());
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
    public function update(RequestEclesial $requesteclesial)
    {
       Eclesial::findOrFail($requesteclesial->id)->update($requesteclesial->all());

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
        Eclesial::findOrFail($request->id)->delete();

        $notification = array(
            'message' => 'Registro eliminado correctamente',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
