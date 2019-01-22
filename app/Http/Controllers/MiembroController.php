<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestMiembro;
use App\Miembro;
use App\Avatar;
use App\DetalleFamilia;
use App\Helpers\Helper;


class MiembroController extends Controller
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
        $miembros=Miembro::orderBy('nombre')->paginate(24);

        return view('Miembro.index',compact('miembros')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $avatars = Avatar::all();
        $miembro = new Miembro;
		$btnText = __("Guardar");

        return view('Miembro.create',compact('miembro','btnText','avatars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestMiembro $miembrorequest)
    {  

        if($miembrorequest->hasFile('fotoperfil')) {
			$fotoperfil = Helper::uploadFile( "fotoperfil", 'public');
			$miembrorequest->merge(['fotoperfil' => $fotoperfil]);
		}
		
		Miembro::create($miembrorequest->input());        
        $notification = array(
            'message' => 'Registro creado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('Miembros.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $miembro=Miembro::findorFail($id);
       
       $existefamilia=false;
       $detallesfamilia=null;

        if(!empty($miembro->detallefamilia))
        {
            $detallesfamilia=DetalleFamilia::where('familia_id',$miembro->detallefamilia->familia_id)->with('miembro')->get();
            $existefamilia=true;
        }
    
        return view('Miembro.show',compact('miembro','existefamilia','detallesfamilia')); 

       /* return response()->json($miembros);*/
        /** return  view('Miembro.show',compact('miembros'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $avatars = Avatar::all();
        $miembro = Miembro::findOrFail($id);
        $btnText = __("Actualizar");
        return view('Miembro.create', compact('miembro', 'btnText','avatars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestMiembro $miembrorequest,$id)
    {
        $miembro = Miembro::findOrFail($id);

        if($miembrorequest->hasFile('fotoperfil')) 
        {
            if(!empty($miembro->fotoperfil))
            {
                \Storage::delete('public/'.$miembro->fotoperfil);
            }
        
            $fotoperfil = Helper::uploadFile( "fotoperfil", 'public');
			
			$miembrorequest->merge(['fotoperfil' => $fotoperfil]);
		}

		$miembro->fill($miembrorequest->input())->save();

  
        $notification = array(
            'message' => 'Registro actualizado correctamente',
            'alert-type' => 'info'
        );

        return redirect()->route('Miembros.show', compact('miembro'))->with($notification);
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
            Miembro::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Registro eliminado correctamente',
                'alert-type' => 'info'
            );
            return redirect()->route('Miembros.index')->with($notification);

		} catch (\Exception $exception) {
            $notification = array(
                'message' => 'Eror eliminado registro',
                'alert-type' => 'danger'
            );
			return back()->with($notification);
		}

    }
}

