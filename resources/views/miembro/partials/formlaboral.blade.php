<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="lugar">Lugar de Trabajo</label>
            <input type="text" class="form-control{{ $errors->has('lugar') ? ' is-invalid' : '' }}" name="lugar"
                id="lugar" value="{{ old('lugar') }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="direccion">Dirección de Trabajo</label>
            <input type="text" class="form-control" name="direccion" id="direccion" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                value="{{ old('direccion') }}"> @if ($errors->has('direccion'))
            <span class="invalid-feedback">
					{{ $errors->first('direccion') }}
				</span> @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono"
                id="telefono" value="{{ old('telefono') }}">
                @if ($errors->has('telefono'))
            <span class="invalid-feedback">
					{{ $errors->first('telefono') }}
				</span> @endif
        </div>
    </div>
</div>