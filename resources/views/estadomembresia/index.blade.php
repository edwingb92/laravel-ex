@extends('layouts.layout') 
@section('titulo', "Lista de Estados de Membresía") 
@section('contenido')
<div class="col-xl-6 col-lg-12">
  
 
  <form class="form" method="get" open="{{ route('EstadoMembresia.index') }}" role="form">
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
  
  <table id="mytable" class="table table-hover">
    <thead class="bg-grey bg-lighten-4 thead-light ">
      <th>Nombre</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </thead>
    <tbody>
      @if($estadosmembresia->count()) @foreach($estadosmembresia as $estadomembresia)
      <tr>
        <td>{{$estadomembresia->nombre}}</td>
        <td style="width: 40px">
          <a class="icon-pencil cyan font-large-1 float-xs-right" data-nombre="{{$estadomembresia->nombre}}" data-id={{$estadomembresia->id}} data-toggle="modal" data-target="#edit"></a>
        </td>
        <td style="width: 40px"><a class="icon-trash red font-large-1 float-xs-right" data-id={{$estadomembresia->id}} data-toggle="modal" data-target="#delete"></a>
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="8">No hay registros !!</td>
      </tr>
      @endif
    </tbody>
  </table>
  {{ $estadosmembresia->links() }}
  </div>

  
      <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Editar Estado de Membresía</h4>
            </div>
            <form action="{{route('EstadoMembresia.update','test')}}" method="post">
              {{method_field('patch')}} {{csrf_field()}}
              <div class="modal-body">
                <input type="hidden" name="id" id="id" value="">
                <div class="form-group">
                  <label for="title">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
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
            <form action="{{route('EstadoMembresia.destroy','test')}}" method="post">
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
  
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Estado de Membresía</h4>
              </div>
              <form action="{{route('EstadoMembresia.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                  <input type="hidden" name="id" id="id" value="">
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