@extends('layouts.layout')
@section('titulo')
<h4 class="display-inline-block">Lista de Familias</h4>&nbsp; @include('partials.botonnuevo')
@endsection
@section('contenido')
<div class="col-xl-6 col-lg-12">
 <div class="row">
 </div> 
   
  <table id="mytable" class="table table-hover">
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
  </div>




  

      <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Editar Familia</h4>
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
                <h4 class="modal-title" id="myModalLabel">Nueva Familia</h4>
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