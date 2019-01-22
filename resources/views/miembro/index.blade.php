@extends('layouts.layout') 
@section('titulo', "Lista de Miembros") 
@section('contenido')

<form class="form" method="get" action="{{ route('Miembros.index') }}" role="form">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group right">
                <input type="text" name="nombreb" id="nombreb" class="form-control border-primary" value="{{ old('nombreb') }}" placeholder="Nombre">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input type="submit" value="Buscar" class="btn btn-primary mr-1">
                <a class="btn btn-info" href="{{ route('Miembros.create') }}">Nuevo</a>
            </div>
        </div>
</form>

@if($miembros->count()) @foreach($miembros as $miembro)
<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
    <div class="card border-primary">
        <div class="cardm-body">
            <div class="text-xs-center">
                <div class="row">
                    <a href="{{action('MiembroController@show', $miembro->id)}}">
                @if (empty($miembro->fotoperfil))
                    <img class="avatarm roundedm-circle btn-outline-primary" src="{{ Storage::url($miembro->avatars->url)}}" alt=""></a>                    @else
                    <img class="avatarm roundedm-circle btn-outline-primary" src="{{ Storage::url($miembro->fotoperfil)}}" alt=""></a>
                    @endif
                </div>
                <div class="row">
                    <a class="btn btn-outline-primary btn-sm text-bold-500 " href="{{action('MiembroController@show', $miembro->id)}}">{{title_case($miembro->nombre.' '.$miembro->apellido1.' '.$miembro->apellido2)}}</a>
                </div>
            </div>
            <hr>
            <div style="padding:0.5rem">
                <div class="row">
                    @isset($miembro->estadomembresia->nombre)
                    <div class="tag tag-primary">{{$miembro->estadomembresia->nombre}}</div>
                    @endisset @isset($miembro->tipopersona->nombre)
                    <div class="tag tag-info">{{$miembro->tipopersona->nombre}}</div>
                    @endisset
                </div>
                <div class="row">
                    <div class="border-left-success border-right-3 text-black font-small-3">&nbsp<span class="icon-address-book primary"></span> {{title_case($miembro->direccion)}}</div>
                </div>
                <div class="row">
                    <div class="border-left-warning border-right-3 text-black font-small-3">&nbsp<span class="icon-phone primary position-relative valign-bottom"></span> {{ $miembro->telefono ===
                        null ? $miembro->celular : $miembro->celular.' - '.$miembro->telefono}}</div>
                </div>
                <div class="row"><div class="border-left-red border-right-3 text-black font-small-3"> &nbsp;
                        @isset($miembro->email)
                   <span class="icon-envelop primary position-relative valign-bottom"></span> {{ $miembro->email ===
                        null ? ' ' : $miembro->email}}
                        @endisset
                    </div>
                </div>
            </div>
            <hr>
            <div class="rowm text-xs-right">
                <a href="{{ route('Miembros.edit', $miembro->id) }}" class="btn btn-outline-info display-inline-block">
                    <div class="icon-pen3"></div>
                </a>
                <a class="btn btn-outline-danger display-inline-block" style="color:#DA4453" data-id={{$miembro->id}} data-toggle="modal" data-target="#delete">
                    <div class="icon-trash3"></div> 
                </a>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Confirmar</h4>
            </div>
            <form action="{{action('MiembroController@destroy','test')}}" method="post">
                {{method_field('delete')}} {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                        ¿Esta Seguro que desea eliminar el registro?
                    </p>
                    <input type="hidden" name="id" id="id" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">No, Cancelar</button>
                    <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach @else
<h3>No hay registros !!</h3>
@endif {{ $miembros->links() }}
@endsection