@extends('layouts.layout') 
@section('titulo', "Editar Clasificación Social" ) 
@section('contenido') @if (count($errors) >
0)
<div class="alert alert-danger">
	<strong>Error!</strong> Revise los campos obligatorios.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif @if(Session::has('success'))
<div class="alert alert-info">
	{{Session::get('success')}}
</div>
@endif


<form method="POST" action="{{ route('ClasificacionSocial.update',$clasificacionsocial->id) }}" role="form">
	{{ csrf_field() }}
	<input name="_method" type="hidden" value="PATCH">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="form-group right">
				<input type="text" name="nombre" id="nombre" class="form-control border-primary" value="{{$clasificacionsocial->nombre}}">
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<input type="submit" value="Actualizar" class="btn btn-primary mr-1">
				<a href="{{ route('ClasificacionSocial.index') }}" class="btn btn-success mr-1">Atrás</a>
			</div>

		</div>
</form>
@endsection