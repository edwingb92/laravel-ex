@extends('layouts.layout') 
@section('titulo', "Lista de Clasificaciones Sociales") 
@section('contenido')
<div class="col-xl-6 col-lg-12">
  
 
  <form class="form" method="get" open="{{ route('ClasificacionSocial.index') }}" role="form">
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


  {{--
  <form class="form" method="POST" action="{{ route('ClasificacionSocial.store') }}" role="form">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group right">
          <input type="text" name="nombre" id="nombre" class="form-control border-primary" placeholder="Nombre">
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <input type="submit" value="Guardar" class="btn btn-primary mr-1">
        </div>
      </div>
  </form>
  --}}

  <table id="mytable" class="table table-hover">
    <thead class="bg-grey bg-lighten-4 thead-light ">
      <th>Nombre</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </thead>
    <tbody>
      @if($clasificacionessociales->count()) @foreach($clasificacionessociales as $clasificacionsocial)
      <tr>
        <td>{{$clasificacionsocial->nombre}}</td>
        <td style="width: 40px">
          <a class="icon-pencil cyan font-large-1 float-xs-right" data-nombre="{{$clasificacionsocial->nombre}}" data-id={{$clasificacionsocial->id}} data-toggle="modal" data-target="#edit"></a>
        </td>
        <td style="width: 40px">



          <a class="icon-trash red font-large-1 float-xs-right" data-id={{$clasificacionsocial->id}} data-toggle="modal" data-target="#delete"></a>
        </td>
        {{--
        <form action="{{action('ClasificacionSocialController@destroy', $clasificacionsocial->id)}}" method="post">
          {{csrf_field()}}
          <input name="_method" type="hidden" value="DELETE">
          <button class="btn btn-icon btn-danger mr-1 btn-sm" type="submit"><span class="icon-trash"></span></button> --}}
          </td>
      </tr>

      @endforeach

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Nueva Clasificación Social</h4>
            </div>
            <form action="{{route('ClasificacionSocial.store')}}" method="post">
              {{csrf_field()}}
              <div class="modal-body">
                <input type="hidden" name="id" id="id" value="">
                <div class="form-group">
                  <label for="title">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" required>
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
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Editar Clasificación Social</h4>
            </div>
            <form action="{{route('ClasificacionSocial.update',$clasificacionsocial->id)}}" method="post">
              {{method_field('patch')}} {{csrf_field()}}
              <div class="modal-body">
                <input type="hidden" name="id" id="id" value="">
                <div class="form-group">
                  <label for="title">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" required>
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


      <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-center" id="myModalLabel">Confirmar</h4>
            </div>
            <form action="{{route('ClasificacionSocial.destroy',$clasificacionsocial->id)}}" method="post">
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
      @else
      <tr>
        <td colspan="8">No hay registros !!</td>
      </tr>
      @endif
    </tbody>
  </table>
  {{ $clasificacionessociales->links() }}
  </div>
@endsection