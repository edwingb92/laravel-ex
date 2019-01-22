@extends('layouts.layout') 
@section('titulo', "Nueva Clasificación Social") 
@section('contenido') 
@if (count($errors) > 0)
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
				<input type="submit" value="Guardar" class="btn btn-warning mr-1">
				<a href="{{ route('ClasificacionSocial.index') }}" class="btn btn-primary">Atrás</a>
			</div>
		</div>
</form>
@endsection