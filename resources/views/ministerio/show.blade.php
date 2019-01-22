@extends('layouts.layout') 
@section('titulo')
@endsection
 
@section('card')

<div class="col-md-6">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Ministerio de
        <div class="display-inline-block primary">{{$ministerio->nombre}}</div>
      </h4>
      <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
      <div class="heading-elements">
        <ul class="list-inline mb-0">
          <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
          <!-- <li><a data-action="reload"><i class="icon-reload"></i></a></li>-->
          <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
          <!-- <li><a data-action="close"><i class="icon-cross2"></i></a></li>-->
        </ul>
      </div>
    </div>
    <div class="card-body collapse in">
      <div class="card-block">
        <div class="col-lg-12">


          <form class="form" method="POST" action="{{ route('DetalleMinisterio.store')}}" role="form">
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
                  <select name="roles_id" id="roles_id" class="form-control{{ $errors->has('roles_id') ? ' is-invalid' : ' border-primary' }}"
                    style="height:33px" placeholder="Parentesco">
                <option>Seleccione un Rol</option>
                @foreach(\App\RolMinisterio::where('ministerio_id', $ministerio->id)->orderBy('nombre', 'desc')->get(); as $rol)
                <option {{ (int) old('roles_id') === $rol->id ? 'selected' : '' }} value="{{ $rol->id }}">
                  {{ $rol->nombre }}
                </option>
                @endforeach
          </select> @if ($errors->has('roles_id'))
                  <span class="invalid-feedback">
              {{ $errors->first('roles_id') }}
            </span> @endif
                  <input type="hidden" name="ministerio_id" value="{{$ministerio->id}}">
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
              <th>Rol</th>
            </thead>
            <tbody>
              @if($miembrosd->count()) @foreach($miembrosd as $miembrosd)
              <tr>
                <td> @if (empty($miembrosd->fotoperfil))
                  <a href="{{action('MiembroController@show', $miembrosd->id)}}"><img class="avatarf roundedm-circle btn-outline-primary" src="{{ Storage::url($miembrosd->avatars->url)}}"
            alt=""></a> @else
                  <a href="{{action('MiembroController@show', $miembrosd->id)}}">
          <img class="avatarf roundedm-circle btn-outline-primary" src="{{ Storage::url($miembrosd->fotoperfil)}}" alt=""></a>                  @endif
                </td>
                <td>{{title_case($miembrosd->nombre.' '.$miembrosd->apellido1)}}</td>
                <td>@foreach($miembrosd->detalleministerio as $detalleministerio) <div class="tag tag-primary">{{$detalleministerio->rol->nombre}}</div> @endforeach</td>
              </tr>

              @endforeach @else
              <tr>
                <td colspan="8">No hay registros !!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Bloque de Roles --->

<div class="col-md-6">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title display-inline-block"> Roles del Ministerio de
        <div class="display-inline-block primary">{{$ministerio->nombre}}</div>
      </h4>
      <button type="button" data-toggle="modal" data-target="#myModalRolMinisterio" class="btn btn-outline-success btn-sm display-inline-block">
          <div class="icon-plus2"></div>
      </button>
      <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
      <div class="heading-elements">
        <ul class="list-inline mb-0">
          <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
          <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
        </ul>
      </div>
    </div>
    <div class="card-body collapse in">
      <div class="card-block">



        <div class="col-lg-12">
          <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
            <div class="card">
          @if($ministerio->roles->count()) @foreach($ministerio->roles as $rol)

              <div id="heading1" class="card-header">
                <div class="row text-xs-right">
                  <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#a{{$rol->id}}" aria-expanded="false" aria-controls="a{{$rol->id}}"
                    class="card-title lead collapsed float-xs-left">
                    {{$rol->nombre}}</a>
                  <button type="button" class="btn btn-outline-info btn-sm display-inline-block" data-id={{$rol->id}} 
                        data-nombre="{{$rol->nombre}}"
                        data-toggle="modal" data-target="#editRolMinisterio" >
                                <div class="icon-pen3"></div>
                        </button>
                  <a class="btn btn-outline-danger btn-sm display-inline-block" style="color:#DA4453" data-id={{$rol->id}} data-action={{action('RolMinisterioController@destroy','test')}} data-toggle="modal" data-target="#delete">
                      <div class="icon-trash3"></div> 
                  </a>
                </div>


              </div>
              <div id="a{{$rol->id}}" role="tabpanel" aria-labelledby="heading1" class="card-collapse collapse" aria-expanded="false" style="">
                <div class="card-body">
                  <div class="card-block">
                    @if($rol->detalleministerio->count())
                    <div role="tabpanel" class="tab-pane active" id="ta{{$rol->id}}" aria-expanded="true" aria-labelledby="base-tab1">


                      @foreach($rol->detalleministerio as $detalleministerio)


                      <ul class="list-group">
                        <li class="list-group-item">

                          @if (empty($detalleministerio->miembro->fotoperfil))
                          <a href="{{action('MiembroController@show', $detalleministerio->miembro->id)}}">
                                           <img alt="Avatar" class="md-avatar rounded-circle" src="{{ Storage::url($detalleministerio->miembro->avatars->url)}}" >
                                           </a> @else
                          <a href="{{action('MiembroController@show', $detalleministerio->miembro->id)}}">
                                           <img alt="Avatar" class="md-avatar rounded-circle" src="{{ Storage::url($detalleministerio->miembro->fotoperfil)}}" >
                                           </a> @isset($detalleministerio->miembro->nombre)
                          <h6 class="display-inline-block">{{title_case($detalleministerio->miembro->nombre.' '.$detalleministerio->miembro->apellido1)}}</h6>
                          <a class="btn btn-outline-danger btn-sm display-inline-block" style="color:#DA4453" data-id={{$detalleministerio->id}} data-action={{action('DetalleMinisterioController@destroy','test')}} data-toggle="modal" data-target="#delete">
                            <div class="icon-trash3"></div> 
                        </a>
                          @endisset
                          <div class="row text-muted">
                            <span>
                          <i class="icon-address-book btn-sm"></i>{{title_case($detalleministerio->miembro->direccion)}}

                      @if(!empty($detalleministerio->miembro->email))
                      <i class="icon-envelope-o btn-sm"></i>{{$detalleministerio->miembro->email}}
                      @endif
                      <i class="icon-phone btn-sm"></i>{{$detalleministerio->miembro->celular}}
                        </span>
                          </div>

                          @endif


                        </li>
                      </ul>



                      @endforeach
                    </div>
                    @else
                    No hay miembros asociados a este rol
                    @endif
                  </div>
                </div>
              </div>
            
          @endforeach @else @endif
        </div>
      </div>

        </div>
      </div>
    </div>
  </div>
</div>




<!---->



<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Confirmar</h4>
      </div>
      <form action="" method="post">
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


     <!-- Modal -->
     <div class="modal fade" id="myModalRolMinisterio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Nuevo Rol</h4>
          </div>
          <form action="{{route('RolMinisterio.store')}}" method="post">
            {{csrf_field()}}
            <div class="modal-body">
              <input type="hidden" name="id" id="id" value="">
              <input type="hidden" name="ministerio_id" id="ministerio_id" value={{$ministerio->id}}>
              <div class="form-group">
                <label for="title">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
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


      <!-- Modal -->
      <div class="modal fade" id="editRolMinisterio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Editar Rol</h4>
            </div>
            <form action="{{route('RolMinisterio.update','test')}}" method="post">
              {{method_field('patch')}} {{csrf_field()}}
              <div class="modal-body">
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="ministerio_id" id="ministerio_id" value={{$ministerio->id}}>
                <div class="form-group">
                  <label for="title">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
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