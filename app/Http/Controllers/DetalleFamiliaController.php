<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestDetalleFamilia;
use App\DetalleFamilia;

class DetalleFamiliaController extends Controller
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
    public function store(RequestDetalleFamilia $requestdetallefamilia)
    {
        DetalleFamilia::create($requestdetallefamilia->all());
        $notification = array(
            'message' => 'Registro creado correctamente',
            'alert-type' => 'info'
        );
    /**    FamiliaController@show', $familia->id*/
        return back()->with($notification);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DetalleFamilia::findOrFail($request->id)->delete();

        $notification = array(
            'message' => 'Registro eliminado correctamente',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
