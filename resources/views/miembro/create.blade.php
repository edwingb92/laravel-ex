@extends('layouts.layout') 
@section('titulo', "Nuevo Miembro") 
@section('contenido')

<form class="form" method="POST" action="{{ ! $miembro->id ? route('Miembros.store') : route('Miembros.update', $miembro->id)}}"
 novalidate enctype="multipart/form-data">

	@if($miembro->id) 
	@method('PUT') 
	@endif
	@csrf
	<div class="row">
			<input type="hidden" name="id" id="id" value="{{ old('id') ?: $miembro->id }}" name="id">
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input name="nombre" id="nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : ' border-primary' }}" value="{{ old('nombre') ?: $miembro->nombre }}"
				 required autofocus/> @if ($errors->has('nombre'))
				<span class="invalid-feedback">
					{{ $errors->first('nombre') }}
				</span> @endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="apellido1">Apellido 1</label>
				<input type="text" id="apellido1" class="form-control {{ $errors->has('apellido1') ? ' is-invalid' : ' border-primary' }}" value="{{ old('apellido1') ?: $miembro->apellido1 }}" name="apellido1" required> 
				@if ($errors->has('apellido1'))
				<span class="invalid-feedback">
					{{ $errors->first('apellido1') }}
				</span> @endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="apellido2">Apellido 2</label>
				<input type="text" id="apellido2" class="form-control{{ $errors->has('apellido2') ? ' is-invalid' : '' }}" value="{{ old('apellido2') ?: $miembro->apellido2 }}" name="apellido2"> 
				@if ($errors->has('apellido2'))
				<span class="invalid-feedback">
					{{ $errors->first('apellido2') }}
				</span> @endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="genero">Sexo</label>
				<select id="genero" class="form-control {{ $errors->has('genero') ? ' is-invalid' : ' border-primary' }}" name="genero">
						<option></option>
						<option {{ old('genero') === 'F' || $miembro->genero === 'F' ? 'selected' : '' }}  value="F" >Femenino</option>
						<option {{ old('genero') === 'M' || $miembro->genero === 'M' ? 'selected' : '' }} value="M" >Masculino</option>
				</select>	
				@if ($errors->has('genero'))
				<span class="invalid-feedback">
					{{ $errors->first('genero') }}
				</span> 
				@endif			
			</div>			
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="tipodocumento_id">Tipo de DNI</label>
				<select name="tipodocumento_id" id="tipodocumento_id" class="form-control{{ $errors->has('tipodocumento_id') ? ' is-invalid' : '' }}">
						<option></option>
					@foreach(\App\TipoDocumento::pluck('nombre', 'id') as $id => $tipodocumento)
						<option {{ (int) old('tipodocumento_id') === $id || $miembro->tipodocumento_id === $id ? 'selected' : '' }} value="{{ $id }}">
							{{ $tipodocumento }}
						</option>
					@endforeach
				</select>
				@if ($errors->has('tipodocumento_id'))
				<span class="invalid-feedback">
					{{ $errors->first('tipodocumento_id') }}
				</span> 
				@endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="numerodocumento">DNI</label>
				<input type="text" id="numerodocumento" class="form-control{{ $errors->has('numerodocumento') ? ' is-invalid' : '' }}" value="{{ old('numerodocumento') ?: $miembro->numerodocumento }}"
				 name="numerodocumento"> 
				 @if ($errors->has('numerodocumento'))
				<span class="invalid-feedback">
					{{ $errors->first('numerodocumento') }}
				</span> 
				@endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="nacionalidad">Nacionalidad</label>
				<input type="text" id="nacionalidad" class="form-control{{ $errors->has('nacionalidad') ? ' is-invalid' : '' }}" value="{{ old('nacionalidad') ?: $miembro->nacionalidad }}"
				 name="nacionalidad"> 
				 @if ($errors->has('nacionalidad'))
				<span class="invalid-feedback">
					{{ $errors->first('nacionalidad') }}
				</span> 
				@endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="fechanacimiento">Fecha de Nacimiento</label>
				<input type="date" id="fechanacimiento" class="form-control{{ $errors->has('fechanacimiento') ? ' is-invalid' : '' }}" value="{{ old('fechanacimiento') ?: $miembro->fechanacimiento }}"
				 name="fechanacimiento"> 
				 @if ($errors->has('fechanacimiento'))
				<span class="invalid-feedback">
					{{ $errors->first('fechanacimiento') }}
				</span> 
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="lugarnacimiento">Lugar de Nacimiento</label>
				<input type="text" id="lugarnacimiento" class="form-control{{ $errors->has('lugarnacimiento') ? ' is-invalid' : '' }}" value="{{ old('lugarnacimiento') ?: $miembro->lugarnacimiento }}"
				 name="lugarnacimiento"> 
				 @if ($errors->has('lugarnacimiento'))
				<span class="invalid-feedback">
					{{ $errors->first('lugarnacimiento') }}
				</span> 
				@endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				<input type="text" id="telefono" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" value="{{ old('telefono') ?: $miembro->telefono }}"
				 name="telefono"> 
				 @if ($errors->has('telefono'))
				<span class="invalid-feedback">
					{{ $errors->first('telefono') }}
				</span> 
				@endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="celular">Celular</label>
				<input type="text" id="celular" class="form-control{{ $errors->has('celular') ? ' is-invalid' : ' border-primary' }}" value="{{ old('celular') ?: $miembro->celular }}"
				 name="celular" required> 
				 @if ($errors->has('celular'))
				<span class="invalid-feedback">
					{{ $errors->first('celular') }}
				</span> 
				@endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="email">Correo Electrónico</label>
				<input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') ?: $miembro->email }}"
				 name="email"> 
				 @if ($errors->has('email'))
				<span class="invalid-feedback">
					{{ $errors->first('email') }}
				</span> 
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="departamento">Departamento</label>
				<input type="text" id="departamento" class="form-control{{ $errors->has('departamento') ? ' is-invalid' : '' }}" value="{{ old('departamento') ?: $miembro->departamento }}"
				 name="departamento"> 
				 @if ($errors->has('departamento'))
				<span class="invalid-feedback">
					{{ $errors->first('departamento') }}
				</span> 
				@endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="municipio">Municipio</label>
				<input type="text" id="municipio" class="form-control{{ $errors->has('municipio') ? ' is-invalid' : '' }}" value="{{ old('municipio') ?: $miembro->municipio }}"
				 name="municipio"> 
				 @if ($errors->has('municipio'))
				<span class="invalid-feedback">
					{{ $errors->first('municipio') }}
				</span> 
				@endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="direccion">Dirección</label>
				<input type="text" id="direccion" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : ' border-primary' }}" value="{{ old('direccion') ?: $miembro->direccion }}" name="direccion" required> 
				@if ($errors->has('direccion'))
				<span class="invalid-feedback">
					{{ $errors->first('direccion') }}
				</span> 
				@endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="codigopostal">Código Postal</label>
				<input type="text" id="codigopostal" class="form-control{{ $errors->has('codigopostal') ? ' is-invalid' : '' }}" value="{{ old('codigopostal') ?: $miembro->codigopostal }}"
				 name="codigopostal"> @if ($errors->has('codigopostal'))
				<span class="invalid-feedback">
					{{ $errors->first('codigopostal') }}
				</span> @endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="profesion">Profesión</label>
				<select name="profesion_id" id="profesioncombo" class="form-control{{ $errors->has('profesion_id') ? ' is-invalid' : '' }}" style="width:100%">
							<option></option>
							@foreach(\App\Profesion::pluck('nombre', 'id') as $id => $profesion)
								<option {{ (int) old('profesion_id') === $id || $miembro->profesion_id === $id ? 'selected' : '' }} value="{{ $id }}">
									{{ $profesion }}
								</option>
							@endforeach
				</select>
				@if ($errors->has('profesion_id'))
				<span class="invalid-feedback">
					{{ $errors->first('profesion_id') }}
				</span> 
				@endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="tipopersona_id">Don de Servicio</label>
						<select name="tipopersona_id" id="tipopersona_id" class="form-control{{ $errors->has('tipopersona_id') ? ' is-invalid' : ' border-primary' }}">
								<option></option>
								@foreach(\App\TipoPersona::pluck('nombre', 'id') as $id => $tipopersona)
									<option {{ (int) old('tipopersona_id') === $id || $miembro->tipopersona_id === $id ? 'selected' : '' }} value="{{ $id }}">
										{{ $tipopersona }}
									</option>
								@endforeach
					</select>
					@if ($errors->has('tipopersona_id'))
				<span class="invalid-feedback">
					{{ $errors->first('tipopersona_id') }}
				</span> 
				@endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="clasificacionsocial">Clasificación Social</label>
				<select name="clasificacionsocial_id" id="clasificacionsocial_id" class="form-control{{ $errors->has('clasificacionsocial_id') ? ' is-invalid' : ' border-primary' }}">
						<option></option>
						@foreach(\App\ClasificacionSocial::pluck('nombre', 'id') as $id => $clasificacionsocial)
							<option {{ (int) old('clasificacionsocial_id') === $id || $miembro->clasificacionsocial_id === $id ? 'selected' : '' }} value="{{ $id }}">
								{{ $clasificacionsocial }}
							</option>
						@endforeach
			</select>
			@if ($errors->has('clasificacionsocial_id'))
				<span class="invalid-feedback">
					{{ $errors->first('clasificacionsocial_id') }}
				</span> 
				@endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="estadocivil">Estado Civil</label>
				<select name="estadocivil_id" id="estadocivil_id" class="form-control{{ $errors->has('estadocivil_id') ? ' is-invalid' : '' }}">
						<option></option>
						@foreach(\App\EstadoCivil::pluck('nombre', 'id') as $id => $estadocivil)
							<option {{ (int) old('estadocivil_id') === $id || $miembro->estadocivil_id === $id ? 'selected' : '' }} value="{{ $id }}">
								{{ $estadocivil }}
							</option>
						@endforeach
			</select>
			@if ($errors->has('estadocivil_id'))
				<span class="invalid-feedback">
					{{ $errors->first('estadocivil_id') }}
				</span> 
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="estadomembresia">Estado Membresía</label>
				<select name="estadomembresia_id" id="estadomembresia_id" class="form-control{{ $errors->has('estadomembresia_id') ? ' is-invalid' : ' border-primary' }}">
						<option></option>
						@foreach(\App\EstadoMembresia::pluck('nombre', 'id') as $id => $estadomembresia)
							<option {{ (int) old('estadomembresia_id') === $id || $miembro->estadomembresia_id === $id ? 'selected' : '' }} value="{{ $id }}">
								{{ $estadomembresia }}
							</option>
						@endforeach
			</select>
			@if ($errors->has('estadomembresia_id'))
				<span class="invalid-feedback">
					{{ $errors->first('estadomembresia_id') }}
				</span> 
				@endif
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
				<label for="municipio">Imagen por defecto</label>
				<div class="select">
					<select id="avatars_id" class="select2-single form-control{{ $errors->has('avatar') ? ' is-invalid' : ' border-primary' }}" name="avatars_id">							
							@if($avatars->count())
							@foreach($avatars as $avatar)								
								<option {{  ( (int) old('avatars_id') === $avatar->id) || ($miembro->avatars_id === $avatar->id && old('avatars_id')===null) ? 'selected' : '' }} value="{{ $avatar->id }}" title="{{ $avatar->url }}">
									{{ $avatar->nombre }}
								</option>
							@endforeach
							@else
							<h3>No hay registros !!</h3>
							@endif	                                   
					</select>
					@if ($errors->has('avatars_id'))
					<span class="invalid-feedback">
						{{ $errors->first('avatars_id') }}
					</span> 
					@endif
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12">
			<div class="form-group">
				<div>
					<label for="">Foto de Perfil</label>
				</div>
				<label id="" class="file center-block">
						<input type="file" value="{{ old('fotoperfil') ?: $miembro->fotoperfil }}" id="fotoperfil" class="{{ $errors->has('fotoperfil') ? ' is-invalid' : '' }}" name="fotoperfil">
						<span class="file-custom"></span>
					</label>
					@if ($errors->has('fotoperfil'))
				<span class="invalid-feedback">
					{{ $errors->first('fotoperfil') }}
				</span> 
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-6">
			<div class="form-group">
					<button type="submit" class="btn btn-primary">
							{{ __($btnText) }}
						</button>					
				<a href="{{ route('Miembros.index') }}" class="btn btn-warning">Atrás</a>
			</div>
			</div>
		</div>
	</div>
</form>
@endsection