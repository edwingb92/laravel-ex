@extends('layouts.layout')
@section('titulo', "Lista de Familias") 
@section('contenido')
<div class="col-xl-6 col-lg-12">
  
 
  <form class="form" method="get" open="{{ route('Familia.index') }}" role="form">
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
  
  <table id="mytable" class="table table-hover table-responsive">
    <thead class="bg-grey bg-lighten-4 thead-light ">
      <th>Nombre</th>
      <th>Integrantes</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </thead>
    <tbody>
      @if($familias->count()) @foreach($familias as $familia)
      <tr>
        <td>{{$familia->nombre}}</td>
        <td>
            <a href="{{action('FamiliaController@show', $familia->id)}}" class="icon-users cyan font-large-1 float-xs-center"></a>
          </td>
        <td>
          <a class="icon-pencil cyan font-large-1 float-xs-center" data-nombre="{{$familia->nombre}}" data-id={{$familia->id}} data-toggle="modal" data-target="#edit"></a>
        </td>
        <td ><a class="icon-trash red font-large-1 float-xs-center" data-id={{$familia->id}} data-toggle="modal" data-target="#delete"></a>
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
  {{ $familias->links() }}
  </div>




  

      <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Editar Tipo de Persona</h4>
            </div>
            <form action="{{route('Familia.update','test')}}" method="post">
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
            <form action="{{route('Familia.destroy','test')}}" method="post">
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
                <h4 class="modal-title" id="myModalLabel">Nuevo Tipo de Persona</h4>
              </div>
              <form action="{{route('Familia.store')}}" method="post">
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