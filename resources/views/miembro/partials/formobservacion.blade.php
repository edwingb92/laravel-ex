<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre"
                id="nombre" value="{{ old('nombre') }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}"
                value="{{ old('fecha') ?: \Carbon\Carbon::today()->format('Y-m-d')}}"> @if ($errors->has('fecha'))
            <span class="invalid-feedback">
					{{ $errors->first('fecha') }}
				</span> @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}" rows="4" cols="50" name="descripcion" id="descripcion" value="{{ old('descripcion') }}"></textarea>
                @if ($errors->has('descripcion'))
            <span class="invalid-feedback">
					{{ $errors->first('descripcion') }}
				</span> @endif
        </div>
    </div>
</div>