@extends('layouts.layout') 
@section('titulo', "Lista de Ministerios") 
@section('contenido')
<div class="col-xl-12 col-lg-12">


  <form class="form" method="get" open="{{ route('Ministerio.index') }}" role="form">
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
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Nuevo</button>
        </div>
      </div>
  </form>

  @if($ministerios->count()) @foreach($ministerios as $ministerio)
  <div class="col-xl-4 col-lg-4 col-xs-6">
    <div class="card card border-primary">
      <div class="card-body">
        @if (!empty($ministerio->fotoministerio))
        <a href="{{action('MinisterioController@show', $ministerio->id)}}">
        <img alt="Avatar" class="card-img-top img-fluid" src="{{ Storage::url($ministerio->fotoministerio)}}" style="width:100%">        @endif
        </a>
        <div class="card-block">
          <h4 class="card-title display-inline-block">{{$ministerio->nombre}}</h4>
          <button type="button" class="btn btn-outline-info btn-sm display-inline-block" data-id={{$ministerio->id}} 
                data-nombre="{{$ministerio->nombre}}"
                data-descripcion="{{ $ministerio->descripcion === null ? null : $ministerio->descripcion}}"
                data-fotoministerio="{{ $ministerio->fotoministerio === null ? null : $ministerio->fotoministerio}}"
                data-toggle="modal" data-target="#editMinisterio" >
                        <div class="icon-pen3"></div>
                </button>
          <a class="btn btn-outline-danger btn-sm display-inline-block" style="color:#DA4453" data-id={{$ministerio->id}} data-action={{action('MinisterioController@destroy','test')}} data-toggle="modal" data-target="#delete">
                <div class="icon-trash3"></div> 
                </a>



          <ul class="nav nav-tabs">
            @if($ministerio->detalleministerio->count())
            <li class="nav-item">
              <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#ta{{$ministerio->id}}" aria-expanded="true">Miembros</a>
            </li>
            @endif @if(!empty($ministerio->descripcion))
            <li class="nav-item">
              <a class="nav-link {{$ministerio->detalleministerio->count() ? '' : 'active'}}" id="base-tab2" data-toggle="tab" aria-controls="tab2"
                href="#t{{$ministerio->id}}" aria-expanded="true">Descripción</a>
            </li>
            @endif
          </ul>
          <div class="tab-content px-1 pt-1">
            @if($ministerio->detalleministerio->count())
            <div role="tabpanel" class="tab-pane active" id="ta{{$ministerio->id}}" aria-expanded="true" aria-labelledby="base-tab1">

              @foreach($ministerio->detalleministerio as $detalleministerio) @if (empty($detalleministerio->miembro->fotoperfil))
              <a href="{{action('MiembroController@show', 1)}}">
                               <img alt="Avatar" class="md-avatar rounded-circle" src="{{ Storage::url($detalleministerio->miembro->avatars->url)}}" >
                               </a> @else
              <a href="{{action('MiembroController@show', 1)}}">
                               <img alt="Avatar" class="md-avatar rounded-circle" src="{{ Storage::url($detalleministerio->miembro->fotoperfil)}}" >
                               </a> @endif @endforeach

            </div>
            @endif @if(!empty($ministerio->descripcion))
            <div class="tab-pane {{$ministerio->detalleministerio->count() ? '' : 'active'}}" id="t{{$ministerio->id}}" aria-labelledby="base-tab2" aria-expanded="false">
              <p>{{$ministerio->descripcion}}</p>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  @endforeach @else

  <td colspan="8">No hay registros !!</td>

  @endif

  </div>


  <!-- Modal  Edit-->
  <div class="modal fade" id="editMinisterio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Editar Tipo de Persona</h4>
        </div>
        <form action="{{route('Ministerio.update','test')}}" method="post" enctype="multipart/form-data">
          {{method_field('patch')}} {{csrf_field()}}
          <div class="modal-body">
            <input type="hidden" name="id" id="id" value="">
            <div class="form-group">
              <label for="title">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <textarea class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}" rows="4" cols="50" name="descripcion"
                id="descripcion" value="{{ old('descripcion') }}"></textarea> @if ($errors->has('descripcion'))
              <span class="invalid-feedback">
                  {{ $errors->first('descripcion') }}
                </span> @endif
            </div>
            <div class="form-group">
              <div>
                <label for="">Logotipo</label>
              </div>
              <label id="" class="file center-block">
                      <input type="file" value="{{ old('fotoministerio') ? ' is-invalid' : ''}}" id="fotoministerio" class="{{ $errors->has('fotoministerio') ? ' is-invalid' : '' }}" name="fotoministerio">
                      <span class="file-custom"></span>
                    </label> @if ($errors->has('fotoministerio'))
              <span class="invalid-feedback">
                    {{ $errors->first('fotoministerio') }}
                  </span> @endif
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info">Guardar Cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!--Modal Detele-->
  <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">Confirmar</h4>
        </div>
        <form action="{{route('Ministerio.destroy','test')}}" method="post">
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

  <!-- Modal Nuevo -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Nuevo Tipo de Persona</h4>
        </div>
        <form action="{{route('Ministerio.store')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="modal-body">
            <input type="hidden" name="id" id="id" value="">
            <div class="form-group">
              <label for="title">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <textarea class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}" rows="4" cols="50" name="descripcion"
                id="descripcion" value="{{ old('descripcion') }}"></textarea> @if ($errors->has('descripcion'))
              <span class="invalid-feedback">
                  {{ $errors->first('descripcion') }}
                </span> @endif
            </div>
            <div class="form-group">
              <div>
                <label for="">Logotipo</label>
              </div>
              <label id="" class="file center-block">
                      <input type="file" value="{{ old('fotoministerio') ? ' is-invalid' : ''}}" id="fotoministerio" class="{{ $errors->has('fotoministerio') ? ' is-invalid' : '' }}" name="fotoministerio">
                      <span class="file-custom"></span>
                    </label> @if ($errors->has('fotoministerio'))
              <span class="invalid-feedback">
                    {{ $errors->first('fotoministerio') }}
                  </span> @endif
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection