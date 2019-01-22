@extends('layouts.layout') 
@section('titulo') Familia
<div class="display-inline-block primary">{{$familia->nombre}}</div>
@endsection
 
@section('contenido')

<div class="col-xl-9 col-lg-12">


  <form class="form" method="POST" action="{{ route('DetalleFamilia.store')}}" role="form">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <div class="select">
            <select id="miembros_id" class="select2-single form-control{{ $errors->has('miembros_id') ? ' is-invalid' : ' border-primary' }}"
              name="miembros_id">							
              @if($miembros->count())
              <option></option>
							@foreach($miembros as $miembro)								
								<option {{  ( (int) old('miembros_id') === $miembro->id) || ($miembro->miembros_id === $miembro->id && old('miembros_id')===null) ? 'selected' : '' }} value="{{ $miembro->id }}" title="{{ $miembro->fotoperfil ===null ? $miembro->avatars->url : $miembro->fotoperfil}}">
									{{ title_case($miembro->nombre.' '.$miembro->apellido1) }}
								</option>
							@endforeach
							@else
							<h3>No hay registros !!</h3>
							@endif	                                   
					</select> @if ($errors->has('miembros_id'))
            <span class="invalid-feedback">
						{{ $errors->first('miembros_id') }}
					</span> @endif
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <select name="parentesco" id="parentesco" class="form-control{{ $errors->has('parentesco') ? ' is-invalid' : ' border-primary' }}"
            style="height:33px" placeholder="Parentesco">
                <option>Seleccione un Parentesco</option>
                @foreach(\App\Parentesco::pluck('nombre', 'id') as $id => $parentesco)
                  <option {{ (int) old('parentesco') === $parentesco || $miembro->parentesco === $parentesco ? 'selected' : '' }} value="{{ $parentesco }}">
                    {{ $parentesco }}
                  </option>
                @endforeach
          </select> @if ($errors->has('parentesco'))
          <span class="invalid-feedback">
              {{ $errors->first('parentesco') }}
            </span> @endif
          <input type="hidden" name="familia_id" value="{{$familia->id}}">
        </div>
        
      </div>
      <div class="col-md-2">
          <button type="submit" class="btn btn-primary" style="padding: 0.4rem 1rem;">Agregar</button>
      </div>
    </div>

  </form>

  <table id="mytable" class="table table-hover table-responsive">
    <thead class="bg-grey bg-lighten-4 thead-light">
      <th>Perfil</th>
      <th>Nombre</th>
      <th>Parentesco</th>
      <th>Eliminar</th>
    </thead>
    <tbody>
      @if($detallesfamilia->count()) @foreach($detallesfamilia as $detallefamilia)
      <tr>
        <td> @if (empty($detallefamilia->miembro->fotoperfil))
            <a href="{{action('MiembroController@show', $detallefamilia->miembro->id)}}"><img class="avatarf roundedm-circle btn-outline-primary" src="{{ Storage::url($detallefamilia->miembro->avatars->url)}}"
            alt=""></a>
          @else
          <a href="{{action('MiembroController@show', $detallefamilia->miembro->id)}}">
          <img class="avatarf roundedm-circle btn-outline-primary" src="{{ Storage::url($detallefamilia->miembro->fotoperfil)}}" alt=""></a>
          @endif
        </td>
        <td>{{$detallefamilia->miembro->nombre.' '.$detallefamilia->miembro->apellido1}}</td>
        <td>{{$detallefamilia->parentesco}}</td>
        <td><a class="icon-trash red font-large-1 float-xs-center" data-id={{$detallefamilia->id}} data-toggle="modal" data-target="#delete"></a></td>
      </tr>

      @endforeach @else
      <tr>
        <td colspan="8">No hay registros !!</td>
      </tr>
      @endif
    </tbody>
  </table>
</div>


<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">Confirmar</h4>
        </div>
        <form action="{{route('DetalleFamilia.destroy','test')}}" method="post">
          {{method_field('delete')}} {{csrf_field()}}
          <div class="modal-body">
            <p class="text-center">
              ¿Está Seguro que desea eliminar el registro?
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

@endsection