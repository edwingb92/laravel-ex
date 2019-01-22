<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            <label for="fechaingreso">Fecha de Ingreso</label>
            <input type="date" id="fechaingreso" class="form-control{{ $errors->has('fechaingreso') ? ' is-invalid' : '' }}" value="{{ old('fechaingreso') ?: '' }}"
                name="fechaingreso"> @if ($errors->has('fechaingreso'))
            <span class="invalid-feedback">
					{{ $errors->first('fechaingreso') }}
				</span> @endif
        </div>
    </div>
    
    <div class="col-md-7">
        <div class="form-group">
            <label for="iglesiaanterior">Iglesia Anterior</label>
            <input type="text" class="form-control{{ $errors->has('iglesiaanterior') ? ' is-invalid' : '' }}" name="iglesiaanterior"
                id="iglesiaanterior" value="{{ old('iglesiaanterior') }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            <label for="fechaconversion">Fecha de Conversión</label>
            <input type="date" id="fechaconversion" class="form-control{{ $errors->has('fechaconversion') ? ' is-invalid' : '' }}" value="{{ old('fechaconversion') ?: '' }}"
                name="fechaconversion"> @if ($errors->has('fechaconversion'))
            <span class="invalid-feedback">
					{{ $errors->first('fechaconversion') }}
				</span> @endif

        </div>
    </div>
    <div class="col-md-7">
        <div class="form-group">
            <label for="iglesiaconversion">Iglesia de Conversión</label>
            <input type="text" class="form-control" name="iglesiaconversion" id="iglesiaconversion" class="form-control{{ $errors->has('iglesiaconversion') ? ' is-invalid' : '' }}"
                value="{{ old('iglesiaconversion') }}"> @if ($errors->has('iglesiaconversion'))
            <span class="invalid-feedback">
					{{ $errors->first('iglesiaconversion') }}
				</span> @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            <label>Bautizado</label>
            <div class="input-group">
                <label class="display-inline-block custom-control custom-radio ml-1">
            <input type="radio" name="bautizado"  id="si" value = 1 class="custom-control-input">
            
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description ml-0">Sí</span>
            
        </label>
            <label class="display-inline-block custom-control custom-radio">
            <input type="radio" name="bautizado" id="no" value = 0 class="custom-control-input">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description ml-0">No</span>
        </label> 
        @if ($errors->has('bautizado'))
            <span class=" display-block font-small-2 text-danger">
            {{ $errors->first('bautizado') }}
        </span> @endif
            </div>
           
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            <label for="fechabautismo">Fecha de Bautismo</label>
            <input type="date" id="fechabautismo" class="form-control{{ $errors->has('fechabautismo') ? ' is-invalid' : '' }}" value="{{ old('fechabautismo') ?: '' }}"
                name="fechabautismo"> @if ($errors->has('fechabautismo'))
            <span class="invalid-feedback">
					{{ $errors->first('fechabautismo') }}
				</span> @endif
        </div>
    </div>
    <div class="col-md-7">
        <div class="form-group">
            <label for="iglesiabautismo">Iglesia de Bautismo</label>
            <input type="text" class="form-control{{ $errors->has('iglesiabautismo') ? ' is-invalid' : '' }}" name="iglesiabautismo"
                id="iglesiabautismo" value="{{ old('iglesiabautismo') }}">
                @if ($errors->has('iglesiabautismo'))
            <span class="invalid-feedback">
					{{ $errors->first('iglesiabautismo') }}
				</span> @endif
        </div>
    </div>
</div>