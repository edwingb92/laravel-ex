<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" class="form-control border-primary" placeholder="" name="nombre" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="apellido1">Apellido 1</label>
            <input type="text" id="apellido1" class="form-control border-primary" placeholder="" name="apellido1" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="apellido2">Apellido 2</label>
            <input type="text" id="apellido2" class="form-control " placeholder="" name="apellido2">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="genero">Sexo</label>
            <select id="genero" class="form-control border-primary" name="genero" required>
                    <option value="" ></option>
                    <option value="F" >Femenino</option>
                    <option value="M" >Masculino</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="tipodocumento">Tipo de DNI</label>
            <select id="tipodocumentocombo" class="form-control" name="tipodocumento_id">
                    @if($tiposdocumento->count())
                    <option value=""></option>
                     @foreach($tiposdocumento as $tipodocumento)
                    <option value="{{$tipodocumento->id}}">{{$tipodocumento->nombre}}</option>
                    @endforeach 
                    @else
                    <option value="" >No hay registros</option>
                    @endif
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="numerodocumento">DNI</label>
            <input type="text" id="numerodocumento" class="form-control" placeholder="" name="numerodocumento">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="nacionalidad">Nacionalidad</label>
            <input type="text" id="nacionalidad" class="form-control" placeholder="" name="nacionalidad">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="fechanacimiento">Fecha de Nacimiento</label>
            <input type="date" id="fechanacimiento" class="form-control" name="fechanacimiento">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="lugarnacimiento">Lugar de Nacimiento</label>
            <input type="text" id="lugarnacimiento" class="form-control" placeholder="" name="lugarnacimiento">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" class="form-control" placeholder="" name="telefono">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" id="celular" class="form-control border-primary" placeholder="" name="celular" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="text" id="email" class="form-control" placeholder="" name="email">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="departamento">Departamento</label>
            <input type="text" id="departamento" class="form-control" placeholder="" name="departamento">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="municipio">Municipio</label>
            <input type="text" id="municipio" class="form-control" placeholder="" name="municipio">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" class="form-control border-primary" placeholder="" name="direccion" required>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="postal">Código Postal</label>
            <input type="text" id="postal" class="form-control" placeholder="" name="codigopostal">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="profesion">Profesión</label>
            <select id="profesioncombo" class="form-control" style="width:100%" name="profesion_id">
                    @if($profesiones->count())
                    <option value=""></option>
                    @foreach($profesiones as $profesion)
                   <option value="{{$profesion->id}}">{{$profesion->nombre}}</option>
                   @endforeach 
                   @else
                   <option value="" >No hay registros</option>
                   @endif
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="tipopersona_id">Tipo Persona</label>
            <select id="tipopersonacombo" class="form-control border-primary" name="tipopersona_id" required>
                    @if($tipospersona->count())
                    <option value=""></option>
                    @foreach($tipospersona as $tipopersona)
                   <option value="{{$tipopersona->id}}">{{$tipopersona->nombre}}</option>
                   @endforeach 
                   @else
                   <option value="" >No hay registros</option>
                   @endif
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="clasificacionsocial">Clasificación Social</label>
            <select id="clasificacionsocialcombo" class="form-control border-primary" name="clasificacionsocial_id" required>
                    @if($tipospersona->count())
                    <option value=""></option>
                    @foreach($clasificacionessociales as $clasificacionsocial)
                   <option value="{{$clasificacionsocial->id}}">{{$clasificacionsocial->nombre}}</option>
                   @endforeach 
                   @else
                   <option value="" >No hay registros</option>
                   @endif
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="departamento">Estado Civil</label>
            <select id="estadocivilcombo" class="form-control" name="estadocivil_id">
                    @if($estadosciviles->count())
                    <option value=""></option>
                    @foreach($estadosciviles as $estadocivil)
                   <option value="{{$estadocivil->id}}">{{$estadocivil->nombre}}</option>
                   @endforeach 
                   @else
                   <option value="" >No hay registros</option>
                   @endif
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="municipio">Estado Membresía</label>
            <select id="estadomembresia" class="form-control border-primary" name="estadomembresia_id" required>
                    @if($estadosmembresia->count())
                    <option value=""></option>
                    @foreach($estadosmembresia as $estadomembresia)
                   <option value="{{$estadomembresia->id}}">{{$estadomembresia->nombre}}</option>
                   @endforeach 
                   @else
                   <option value="" >No hay registros</option>
                   @endif
            </select>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <label for="foto">Foto de Perfil</label>
            <label id="projectinput7" class="file center-block">
                <input type="file" id="foto" name="fotoperfil">
                <span class="file-custom"></span>
            </label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="municipio">Imagen por defecto</label>
            <div class="select">
                <select id="fotodefecto" class="select2-single" name="fotodefecto">
                   
                        <option value="default.png">default.png</option>
                        <option value="m1.png">m1.png</option>
                        <option value="f1.png">f1.png</option>
                        <option value="m2.png">m2.png</option>
                        <option value="f2.png">f2.png</option>
                        <option value="m3.png">m3.png</option>
                        <option value="f3.png">f3.png</option>
                        <option value="m4.png">m4.png</option>
                        <option value="f4.png">f4.png</option>
                        <option value="p1.png">p1.png</option>
                        <option value="p2.png">p2.png</option>
                        <option value="p3.png">p3.png</option> 
                        <option value="p4.png">p4.png</option>                                           
                </select>
            </div>
        </div>
    </div>