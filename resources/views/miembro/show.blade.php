@extends('layouts.layout') 
@section('titulo')
<h6>&nbsp</h6>
@endsection
 
@section('contenido')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="row">
        <div class="col-md-4 display-inline-block">
            @if (empty($miembro->fotoperfil)) @isset($miembro->avatars->url)
            <img class="avatarms roundedm-circle " src="{{ Storage::url($miembro->avatars->url)}}" alt=""> @endisset @else
            <img class="avatarms roundedm-circle " src="{{ Storage::url($miembro->fotoperfil)}}" alt=""> @endif
        </div>
        <div class="col-md-8 display-inline-block">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 display-inline-block">
                    @isset($miembro->estadomembresia->nombre)
                    <h6>Estado Membresía</h6>
                    <div class="tag tag-primary">{{$miembro->estadomembresia->nombre}}</div>
                    @endisset
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 display-inline-block">
                    @isset($miembro->tipopersona->nombre)
                    <h6>Tipo Persona</h6>
                    <div class="tag tag-info">{{$miembro->tipopersona->nombre}}</div>
                    @endisset
                </div>
                <div class="col-lg-5 col-md-6 col-sm-6 display-inline-block">
                    @isset($miembro->clasificacionsocial->nombre)
                    <h6>Clasificación Social</h6>
                    <div class="tag tag-info">{{$miembro->clasificacionsocial->nombre}}</div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card-block">
        <div class="row">
            <div class="col-md-6">
                @isset($miembro->genero) @if ($miembro->genero==='M')
                <i class="icon-male2 success" style="font-size: 1.5rem"></i> @else
                <i class="icon-female2 danger" style="font-size: 1.5rem"></i> @endif @endisset
                <h4 class="display-inline-block">{{title_case($miembro->nombre.' '.$miembro->apellido1.' '.$miembro->apellido2)}}</h4>&nbsp
                <a href="{{ route('Miembros.edit', $miembro->id) }}" class="btn btn-outline-info btn-sm display-inline-block">
                    <div class="icon-pen3"></div>
                </a>
                <a class="btn btn-outline-danger btn-sm display-inline-block" style="color:#DA4453" data-id={{$miembro->id}} data-toggle="modal" data-target="#delete">
                        <div class="icon-trash3"></div> 
                    </a>
                <div class="card-block">
                    <div class="row">
                        <h4 class="">Información Basica</h4>
                    </div>
                    <div class="row">
                        <ul class="list-unstyled mb-0">
                            @isset($miembro->tipodocumento->nombre)
                            <li class="h6"><i class="icon-profile primary pr-1"></i>{{title_case($miembro->tipodocumento->nombre.' - '.$miembro->numerodocumento)}}</li>
                            @endisset @if(!empty($miembro->departamento))
                            <li class="h6"><i class="icon-home3 primary pr-1"></i>{{title_case($miembro->departamento.' - '.$miembro->municipio)}}</li>
                            @endif
                            <li class="h6"><i class="icon-address-book primary pr-1"></i>{{title_case($miembro->direccion)}}</li>

                            @if(!empty($miembro->codigopostal))
                            <li class="h6"><i class="icon-location22 primary pr-1"></i>{{$miembro->codigopostal}}</li>
                            @endif @if(!empty($miembro->email))
                            <li class="h6"><i class="icon-envelope-o primary pr-1"></i>{{$miembro->email}}</li>
                            @endif
                            <li class="h6"><i class="icon-phone primary pr-1"></i>{{ $miembro->telefono === null ? $miembro->celular : $miembro->celular.'
                                - '.$miembro->telefono}}</li>
                            @if(!empty($miembro->fechanacimiento))
                            <li class="h6"><i class="icon-calendar4 primary pr-1"></i>{{ $miembro->lugarnacimiento === null ? \Carbon\Carbon::parse($miembro->fechanacimiento)->format('d/m/Y')
                                : $miembro->fechanacimiento.' en '.title_case($miembro->lugarnacimiento)}}</li>
                            @endif @if(!empty($miembro->nacionalidad))
                            <li class="h6"><i class="icon-flag-checkered primary pr-1"></i>{{title_case($miembro->nacionalidad)}}</li>
                            @endif @isset($miembro->profesion->nombre)
                            <li class="h6"><i class="icon-user-md primary pr-1"></i>{{title_case($miembro->profesion->nombre)}}</li>
                            @endisset @isset($miembro->estadocivil->nombre)
                            <li class="h6"><i class="icon-heartbeat primary pr-1"></i>{{title_case($miembro->estadocivil->nombre)}}</li>
                            @endisset
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">

                @if($existefamilia)
                <h6 class="pl-2">Familia <a href="{{action('FamiliaController@show', $miembro->detallefamilia->familia->id)}}" class="primary display-inline-block">{{$miembro->detallefamilia->familia->nombre}}</a></h6>

                @foreach ($detallesfamilia as $detallefamilia) @if($detallefamilia->miembros_id !== $miembro->id) @if(empty($detallefamilia->miembro->fotoperfil))
                @isset($detallefamilia->miembro->avatars->url)

                <div class="col-xl-3 col-lg-3 col-md-4 display-inline-block text-xs-center">
                    <div class="row">
                        <a href="{{action('MiembroController@show', $detallefamilia->miembro->id)}}"><img class="avatarfms roundedm-circle " src="{{ Storage::url($detallefamilia->miembro->avatars->url)}}" alt=""></a>
                    </div>
                    <div class="row">
                        <h6 class="font-small-1">{{title_case($detallefamilia->miembro->nombre.' '.$detallefamilia->miembro->apellido1)}}<br>
                            <div class="{{ $detallefamilia->miembro->genero === 'F' ? 'danger' : 'success'}}">{{title_case($detallefamilia->parentesco)}}</div>
                        </h6>
                    </div>
                </div>
                @endisset @else
                <div class="col-xl-3 col-lg-3 col-md-4 display-inline-block text-xs-center">
                    <div class="row">
                        <a href="{{action('MiembroController@show', $detallefamilia->miembro->id)}}"><img class="avatarfms roundedm-circle " src="{{ Storage::url($detallefamilia->miembro->fotoperfil)}}" alt=""></a>
                    </div>
                    <div class="row">
                        <h6 class="font-small-1">{{title_case($detallefamilia->miembro->nombre.' '.$detallefamilia->miembro->apellido1)}}<br>
                            <div class="{{ $detallefamilia->miembro->genero === 'F' ? 'danger' : 'success'}}">{{title_case($detallefamilia->parentesco)}}</div>
                        </h6>
                    </div>
                </div>
                @endif @endif @endforeach @endif
            </div>
        </div>
        <hr>
        <div class="card-block">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <h4 class="display-inline-block">Información Eclesial</h4>
                        @if (!empty($miembro->eclesial))
                        <button type="button" class="btn btn-outline-info btn-sm display-inline-block" data-id={{$miembro->eclesial->id}} 
                                data-fechaingreso="{{$miembro->eclesial->fechaingreso}}"
                                data-iglesiaanterior="{{ $miembro->eclesial->iglesiaanterior === null ? null : $miembro->eclesial->iglesiaanterior}}"
                                data-fechaconversion="{{ $miembro->eclesial->fechaconversion === null ? null : $miembro->eclesial->fechaconversion}}"
                                data-iglesiaconversion="{{ $miembro->eclesial->iglesiaconversion === null ? null : $miembro->eclesial->iglesiaconversion}}"
                                data-bautizado="{{$miembro->eclesial->bautizado}}"
                                data-fechabautismo="{{ $miembro->eclesial->fechabautismo === null ? null : $miembro->eclesial->fechabautismo}}"
                                data-iglesiabautismo="{{ $miembro->eclesial->iglesiabautismo === null ? null : $miembro->eclesial->iglesiabautismo}}"
                                data-toggle="modal" data-target="#editEclesial" >
                                        <div class="icon-pen3"></div>
                                </button>
                        <a class="btn btn-outline-danger btn-sm display-inline-block" style="color:#DA4453" data-id={{$miembro->eclesial->id}} data-action={{action('EclesialController@destroy','test')}} data-toggle="modal" data-target="#delete">
                                        <div class="icon-trash3"></div> 
                                    </a> @else
                        <button type="button" data-toggle="modal" data-target="#myModalEclesial" class="btn btn-outline-success btn-sm display-inline-block">
                                        <div class="icon-plus2"></div>
                                    </button> @endif


                    </div>
                    <div class="row">
                        <ul class="list-unstyled mb-0">
                            @isset($miembro->eclesial->fechaingreso)
                            <li class="h6">&nbsp<i class="icon-calendar4 primary"></i>&nbspFecha de Ingreso: {{\Carbon\Carbon::parse($miembro->eclesial->fechaingreso)->format('d/m/Y')}}</li>
                            @endisset @isset($miembro->eclesial->iglesiaanterior)
                            <li class="h6">&nbsp<i class="icon-institution primary"></i>&nbspIglesia Anterior: {{$miembro->eclesial->iglesiaanterior}}</li>
                            @endisset @isset($miembro->eclesial->fechaconversion)
                            <li class="h6">&nbsp<i class="icon-calendar4 primary"></i>&nbspFecha de Conversión: {{\Carbon\Carbon::parse($miembro->eclesial->fechaconversion)->format('d/m/Y')}}</li>
                            @endisset @isset($miembro->eclesial->iglesiaconversion)
                            <li class="h6">&nbsp<i class="icon-institution primary"></i>&nbspIglesia de Conversión: {{$miembro->eclesial->iglesiaconversion}}</li>
                            @endisset @isset($miembro->eclesial->bautizado) @if ($miembro->eclesial->bautizado===1)
                            <li class="h6">&nbsp<i class="icon-pagelines primary"></i>&nbspBautizado: Si{{$miembro->eclesial->fechabautismo
                                === null ? '' : ' el '.\Carbon\Carbon::parse($miembro->eclesial->fechabautismo)->format('d/m/Y')}}</li>
                            @else
                            <li class="h6">&nbsp<i class="icon-pagelines primary"></i>&nbspBautizado: No</li>
                            @endif @endisset @isset($miembro->eclesial->iglesiabautismo)
                            <li class="h6">&nbsp<i class="icon-institution primary"></i>&nbspIglesia de Bautismo: {{$miembro->eclesial->iglesiabautismo}}</li>
                            @endisset

                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <h4 class="display-inline-block">Información Laboral</h4>
                        @if (!empty($miembro->laboral))
                        <button type="button" class="btn btn-outline-info btn-sm display-inline-block" data-id={{$miembro->laboral->id}} 
                                        data-lugar="{{$miembro->laboral->lugar}}"
                                        data-direccion="{{ $miembro->laboral->direccion === null ? null : $miembro->laboral->direccion}}"
                                        data-telefono="{{ $miembro->laboral->telefono === null ? null : $miembro->laboral->telefono}}"
                                        data-toggle="modal" data-target="#editLaboral" >
                                                <div class="icon-pen3"></div>
                                        </button>
                        <a class="btn btn-outline-danger btn-sm display-inline-block" style="color:#DA4453" data-id={{$miembro->laboral->id}} data-action={{action('LaboralController@destroy','test')}} data-toggle="modal" data-target="#delete">
                                                <div class="icon-trash3"></div> 
                                            </a> @else
                        <button type="button" data-toggle="modal" data-target="#myModalLaboral" class="btn btn-outline-success btn-sm display-inline-block">
                                                <div class="icon-plus2"></div>
                                            </button> @endif
                    </div>
                    <div class="row">
                        <ul class="list-unstyled mb-0">
                            @isset($miembro->laboral->lugar)
                            <li class="h6">&nbsp<i class="icon-office primary"></i>&nbsp{{title_case($miembro->laboral->lugar)}}</li>
                            @endisset @isset($miembro->laboral->direccion)
                            <li class="h6">&nbsp<i class="icon-address-book primary"></i>&nbsp{{title_case($miembro->laboral->direccion)}}</li>
                            @endisset @isset($miembro->laboral->telefono)
                            <li class="h6">&nbsp<i class="icon-phone primary"></i>&nbsp{{title_case($miembro->laboral->telefono)}}</li>
                            @endisset
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-block">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <h4 class="display-inline-block">Observaciones</h4>
                        <button type="button" data-toggle="modal" data-target="#myModalObservacion" class="btn btn-outline-success btn-sm display-inline-block">
                                        <div class="icon-plus2"></div>
                                    </button>
                    </div>
                    <div class="row">
                        @if($miembro->observaciones->count())

                        <div class="timeline-centered">

                            @foreach($miembro->observaciones as $observacion)

                            <article class="timeline-entry">

                                <div class="timeline-entry-inner">

                                    <div class="timeline-icon bg-success" style="line-height: 0px;">
                                        <a href="{{action('MiembroController@show', $detallefamilia->miembro->id)}}">
                                        @if (empty($observacion->user->fotoperfil)) @isset($observacion->user->avatars->url)
                                            <img class="avatarobser roundedm-circle " src="{{ Storage::url($observacion->user->avatars->url)}}" alt=""> @endisset @else
                                            <img class="avatarobser roundedm-circle " src="{{ Storage::url($observacion->user->fotoperfil)}}" alt=""> @endif
                                            </a>
                                    </div>

                                    <div class="timeline-label">

                                        <h2 class="primary display-inline-block">{{$observacion->nombre}}</h2>
                                        <p>{{$observacion->descripcion}}.
                                            <footer class="blockquote-footer">
                                                <cite title="Source Title"><a class="blue-grey" href="{{action('MiembroController@show', $observacion->user->id)}}" >{{title_case($observacion->user->nombre.' '.$observacion->user->apellido1)}}<a> {{$observacion->fecha}}</cite>
                                                <button type="button" class="btn btn-outline-info btn-sm display-inline-block" data-nombre="{{$observacion->nombre}}" data-fecha="{{$observacion->fecha}}"
                                                    data-descripcion="{{$observacion->descripcion}}" data-id={{$observacion->id}} data-users_id={{Auth::user()->miembro->id}} data-toggle="modal" data-target="#editObservacion">
                                                            <div class="icon-pen3"></div>
                                                            </button>
                                                <a class="btn btn-outline-danger btn-sm display-inline-block" style="color:#DA4453" data-id={{$observacion->id}} data-action={{action('ObservacionController@destroy','test')}} data-toggle="modal" data-target="#delete">
                                                                    <div class="icon-trash3"></div> 
                                                                </a>
                                            </footer>

                                    </div>
                                </div>

                            </article>
                            @endforeach

                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @include('miembro.partials.observaciones')
    @include('miembro.partials.delete')
    @include('miembro.partials.eclesial')
    @include('miembro.partials.laboral')
@endsection