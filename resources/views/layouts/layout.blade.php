<!DOCTYPE html>
<html lang="es">

<head>
	<title>Iglesia Cristiana Cuadrangular de Tame</title>
	<link rel="icon" type="image/png" href="{{asset('images/logo/robust-logo-small.png')}}" sizes="32x32">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

	<!-- BEGIN VENDOR CSS-->
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<!-- font icons-->
	<link href="{{ asset('fonts/icomoon.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('fonts/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('vendors/css/extensions/pace.css') }}" rel="stylesheet" type="text/css">
	<!-- END VENDOR CSS-->

	<!-- BEGIN ROBUST CSS-->
	<link href="{{ asset('css/bootstrap-extended.css') }}" rel="stylesheet" type="text/css">
	
	<!-- END ROBUST CSS-->
	<!-- BEGIN Page Level CSS-->
	<link href="{{ asset('css/core/menu/menu-types/vertical-menu.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/core/menu/menu-types/vertical-overlay-menu.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/core/colors/palette-gradient.css') }}" rel="stylesheet" type="text/css">
	<!-- END Page Level CSS-->
	<!-- BEGIN Custom CSS-->
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/card.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/select2-bootstrap.min.css')}}" />
	<link href="{{ asset('css/colors.css') }}" rel="stylesheet" type="text/css">


	<!-- END Custom CSS-->
	<!-- BEGIN Toastr CSS-->
	<link href="{{ asset('toastr/toastr.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css">
	<!-- END Toastr CSS-->

</head>

<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
	<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-dark navbar-shadow">
		<div class="navbar-wrapper">
			<div class="navbar-header">
				<ul class="nav navbar-nav">
					<li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
					<li class="nav-item"><a href="{{ route('home') }}" class="navbar-brand nav-link"><img alt="branding logo" src="{{asset('images/logo/robust-logo-light.png')}}" data-expand="{{asset('images/logo/robust-logo-light.png')}}" data-collapse="{{asset('images/logo/robust-logo-small.png')}}" class="brand-logo"></a></li>
					<li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
				</ul>
			</div>
			<div class="navbar-container content container-fluid">
				<div id="navbar-mobile" class="collapse navbar-toggleable-sm">
					<ul class="nav navbar-nav">
						<li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
						<li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
					</ul>
					<ul class="nav navbar-nav float-xs-right">
						<li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online">
								@if(empty(Auth::user()->miembro->fotoperfil)) 
								@isset(Auth::user()->miembro->avatars->url)
								<img src="{{ Storage::url(Auth::user()->miembro->avatars->url)}}" alt="avatar"> 
								@endisset 
								@else
								<img src="{{ Storage::url(Auth::user()->miembro->fotoperfil)}}" alt="avatar"> 
								@endif							
							<i></i></span><span class="user-name"> {{ Auth::user()->name }}</span></a>
							<div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a><a href="#" class="dropdown-item"><i class="icon-mail6"></i> My Inbox</a>
								<a href="#" class="dropdown-item"><i class="icon-clipboard2"></i> Task</a><a href="#" class="dropdown-item"><i class="icon-calendar5"></i> Calender</a>
								<div class="dropdown-divider"></div><a href="{{ route('logout') }}" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<!-- ////////////////////////////////////////////////////////////////////////////-->


	<!-- main menu-->
	<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
		<!-- main menu header-->
		<div class="main-menu-header">
			<input type="text" placeholder="Search" class="menu-search form-control round" />
		</div>
		<!-- / main menu header-->
		<!-- main menu content-->
		<div class="main-menu-content">
			<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
				<li class="active"><a href="{{ url('/') }}"><i class="icon-home3"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Inicio</span></a></li>

				<li><a href="{{ url('/Ministerio') }}"><i class="icon-texture"></i> <span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Ministerios</span></a></li>
				<li><a href="{{ url('/Miembros') }}"><i class="icon-users2"></i> <span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Miembros</span></a></li>
				<li><a href="{{ url('/Familia') }}"><i class="icon-group"></i> <span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Familias</span></a></li>
				<li class=" nav-item"><a href=""><i class="icon-clipboard2"></i><span data-i18n="nav.dash.main" class="menu-title">Inventario</span></a>
					<ul class="menu-content">
							<li class=""><a href="{{ url('/Articulos') }}" data-i18n="nav.dash.main" class="menu-item">Artículos</a></li>
							<li class=""><a href="{{ url('/CategoriaInventario') }}" data-i18n="nav.dash.main" class="menu-item">Categorias</a></li>
							<li class=""><a href="{{ url('/AlmacenInventario') }}" data-i18n="nav.dash.main" class="menu-item">Almacenes</a></li>
					</ul>
				</li>
				<li class=" nav-item"><a href=""><i class="icon-cogs2"></i><span data-i18n="nav.dash.main" class="menu-title">Mantenimiento</span><span class="tag tag tag-primary tag-pill float-xs-right mr-2">2</span></a>
					<ul class="menu-content">
						<li class=""><a href="{{ url('/ClasificacionSocial') }}" data-i18n="nav.dash.main" class="menu-item">Clasificación Social</a></li>
						<li class=""><a href="{{ url('/EstadoCivil') }}" data-i18n="nav.dash.main" class="menu-item">Estado Civil</a></li>
						<li class=""><a href="{{ url('/DonServicio') }}" data-i18n="nav.dash.main" class="menu-item">Dones de Servicio</a></li>
						<li class=""><a href="{{ url('/EstadoMembresia') }}" data-i18n="nav.dash.main" class="menu-item">Estados de Membresía</a></li>
						<li class=""><a href="{{ url('/TipoDocumento') }}" data-i18n="nav.dash.main" class="menu-item">Tipos de Documento</a></li>
						<li class=""><a href="{{ url('/Profesion') }}" data-i18n="nav.dash.main" class="menu-item">Profesiones</a></li>						
						
					</ul>
				</li>

			</ul>
		</div>
		<!-- /main menu content-->
		<!-- main menu footer-->
		<!-- include includes/menu-footer-->
		<!-- main menu footer-->
	</div>
	<!-- / main menu-->

	<div class="app-content content container-fluid">
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<!-- stats -->
				<div class="row">
						@section('card')						
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">@yield('titulo')</h4>
								<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
										<!-- <li><a data-action="reload"><i class="icon-reload"></i></a></li>-->
										<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
										<!-- <li><a data-action="close"><i class="icon-cross2"></i></a></li>-->
									</ul>
								</div>
							</div>
							<div class="card-body collapse in">
								<div class="card-block">
									@yield('contenido')
								</div>
								<!-- -->

							</div>
						</div>
					</div>
					@show
				</div>
			</div>
		</div>
	</div>

	<!-- BEGIN VENDOR JS-->
	<script type="text/javascript" src="{{ asset('assets/css/style.css') }}"></script>
	<script src="{{ asset('js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>

	<script src="{{ asset('vendors/js/ui/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('vendors/js/ui/unison.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('vendors/js/ui/blockUI.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('vendors/js/ui/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('vendors/js/ui/screenfull.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('vendors/js/extensions/pace.min.js')}}" type="text/javascript"></script>
	<!-- BEGIN VENDOR JS-->
	<!-- BEGIN PAGE VENDOR JS-->
	<script src="{{ asset('vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
	<!-- END PAGE VENDOR JS-->
	<!-- BEGIN ROBUST JS-->
	<script src="{{ asset('js/core/app-menu.js')}}" type="text/javascript"></script>
	<script src="{{ asset('js/core/app.js')}}" type="text/javascript"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>

	<script src="{{ asset('js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>

	<!-- BEGIN Toastr-->
	<script src="{{ asset('toastr/toastr.js')}}" type="text/javascript"></script>
	<script src="{{ asset('js/core/datatables.min.js')}}" type="text/javascript"></script>

	<!-- END PAGE LEVEL JS-->

	
			
	<script>//funcion para agregar imagenes al select y para buscar
function format (option) {
			if (!option.id) { return option.text; }
			var ob =  '<img style="max-width:2.5rem" src="/storage/'+option.title+'"/>'+" "+option.text ;	// replace image source with option.img (available in JSON)
			return ob;
		};
    
  $("#avatars_id").select2({
	placeholder: "Imagen por defecto",
	theme: "bootstrap",	   
      allowClear: true,
	    templateResult: format,
	    templateSelection: function (option) {
	        if (option.id.length > 0 ) {
	            return "<i class='fa fa-dot-circle-o'></i>"+option.text;
	        } else {
	            return option.text;
	        }
	    },
      escapeMarkup: function (m) {
				return m;
			}
	});
//


$(document).ready(function() {
    var table = $('#mytable').DataTable( {
		language: {
        url: '{{ asset('js/core/datatablespanish.json')}}'
	},
	"drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-sm');
        },
        lengthChange: true,
    } );		
	
} );

//ejemplos que no se utilizan pero que pueden servir mas adelante
$(document).ready(function() {
    var table = $('#mytables').DataTable( {
		language: {
        url: '{{ asset('js/core/datatablespanish.json')}}'
	},
	"drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-sm');
        },
        lengthChange: true,
		dom: 'Bflrtip',
    buttons: [
		{
                    extend: 'pdf',
                    text: 'Pdf',
					className: 'btn btn-outline-primary',
					exportOptions: {
                    columns: ':visible'
                } 
                },
                {
                    extend: 'excel',
                    text: 'Excel',
					className: 'btn btn-outline-primary',
					exportOptions: {
                    columns: ':visible'
                } 
                },
                {
                    extend: 'print',
                    text: 'Imprimir',
					className: 'btn btn-outline-primary',
					exportOptions: {
                    columns: ':visible'
                } 
                },
				{
                    extend: 'colvis',
                    text: 'Columnas',
					className: 'btn btn-outline-primary' 
                }
    ]
    } );
} );

var dtage = $('#dt-range').DataTable();


// Escucha de eventos a las dos entradas de filtrado de rango para volver a dibujar en la entrada
    $('#min, #max').keyup(function() {
        dtage.draw();
    });
//fin de ejemploss


//funcion para agregar imagenes al select y para buscar
function format (option) {
			if (!option.id) { return option.text; }
			var ob =  '<img style="max-width:2.5rem" src="/storage/'+option.title+'"/>'+" "+option.text ;	// replace image source with option.img (available in JSON)
			return ob;
		};
    
  $("#miembros_id").select2({
	placeholder: "Miembro",
	theme: "bootstrap",	   
      allowClear: true,
	    templateResult: format,
	    templateSelection: function (option) {
	        if (option.id.length > 0 ) {
	            return "<i class='fa fa-dot-circle-o'></i>"+option.text;
	        } else {
	            return option.text;
	        }
	    },
      escapeMarkup: function (m) {
				return m;
			}
	});
//

//funcion para aregar el buscar al select
$("#profesioncombo").select2({
	theme: "bootstrap",
	
  });

	</script>

</body>



<script>

	//funcion para agregar valores desde showMinisterio a Modal de RolMinisterio Editar

	$('#editRolMinisterio').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
	  var id = button.data('id') 
	  var nombre = button.data('nombre')  

	  var modal = $(this)
	  modal.find('.modal-body #id').val(id);
	  modal.find('.modal-body #nombre').val(nombre);
	  
      
})
	//funcion para agregar valores desde showMiembro a Modal de Laboral Editar

$('#editMinisterio').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
	  var id = button.data('id') 
	  var nombre = button.data('nombre')  
	  var descripcion = button.data('descripcion') 

	  var modal = $(this)
	  modal.find('.modal-body #id').val(id);
	  modal.find('.modal-body #nombre').val(nombre);
	  modal.find('.modal-body #descripcion').val(descripcion);
	  
      
})


//funcion para agregar valores desde showMiembro a Modal de Laboral Editar

$('#editObservacion').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
	  var id = button.data('id') 
	  var nombre = button.data('nombre') 
	  var fecha = button.data('fecha') 
	  var descripcion = button.data('descripcion') 

	  var modal = $(this)
	  modal.find('.modal-body #id').val(id);
	  modal.find('.modal-body #nombre').val(nombre);
	  modal.find('.modal-body #fecha').val(fecha);
	  modal.find('.modal-body #descripcion').val(descripcion);
	  
      
})

//funcion para agregar valores desde showMiembro a Modal de Laboral Editar

$('#editLaboral').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
	  var id = button.data('id') 
	  var lugar = button.data('lugar') 
	  var direccion = button.data('direccion') 
	  var telefono = button.data('telefono') 

	  var modal = $(this)
	  modal.find('.modal-body #id').val(id);
	  modal.find('.modal-body #lugar').val(lugar);
	  modal.find('.modal-body #direccion').val(direccion);
	  modal.find('.modal-body #telefono').val(telefono);
	  
      
})

	//funcion para agregar valores desde showMiembro a Modal de Eclesial Editar

	$('#editEclesial').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
	  var id = button.data('id') 
	  var fechaingreso = button.data('fechaingreso')
	  var iglesiaanterior = button.data('iglesiaanterior') 
	  var fechaconversion = button.data('fechaconversion') 
	  var iglesiaconversion = button.data('iglesiaconversion') 
	  var bautizado = button.data('bautizado')  
	  var fechabautismo = button.data('fechabautismo') 
	  var iglesiabautismo = button.data('iglesiabautismo') 

	  var modal = $(this)
	  modal.find('.modal-body #id').val(id);
	  modal.find('.modal-body #fechaingreso').val(fechaingreso);
	  modal.find('.modal-body #iglesiaanterior').val(iglesiaanterior);
	  modal.find('.modal-body #fechaconversion').val(fechaconversion);
	  modal.find('.modal-body #iglesiaconversion').val(iglesiaconversion);
	  modal.find('.modal-body #fechabautismo').val(fechabautismo);
	  modal.find('.modal-body #iglesiabautismo').val(iglesiabautismo);
	  if(bautizado==1){
		modal.find('.modal-body #si').attr('checked', 'checked');
	  }
	  else
	  {
		modal.find('.modal-body #no').attr('checked', 'checked');
	  }
	  
      
})
//funcion para agregar valores desde los index de clasificacion social, profesion y otros a Modal de Editar

$('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var nombre = button.data('nombre') 
      var id = button.data('id') 
      var modal = $(this)
      modal.find('.modal-body #nombre').val(nombre);
      modal.find('.modal-body #id').val(id);
})

//funcion para abrir modal de eliminar en todas las vistas
 
$('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id')
	  var action = button.data('action')  
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
	  modal.find('form').attr("action", action)
})

//funcion mostras mensajes cuando tranajan en debida forma store, destroy y update
 
@if(Session::has('message'))
		var type="{{Session::get('alert-type','info')}}"
	
		switch(type){
			case 'info':
		         toastr.info("{{ Session::get('message') }}");
		         break;
	        case 'success':
	            toastr.success("{{ Session::get('message') }}");
	            break;
         	case 'warning':
	            toastr.warning("{{ Session::get('message') }}");
	            break;
	        case 'error':
		        toastr.error("{{ Session::get('message') }}");
		        break;
		}
@endif


//funcion mostras mensajes de error con toastr
@if(count($errors) > 0)
	  
var errores = @json($errors->all());

for(var i in errores){
    toastr.error(errores[i]);
}

@endif

</script>


<script>
	//Logica que permite calcular valor total en el formulario de Articulo
$(document).ready(function () {
    $("#preciounitario").keyup(function () {
        var preciounitario = $(this).val();
		var cantidad = $("#cantidad").val();
		if(preciounitario>0)
		{
			if(cantidad>0)
			{
				var total = cantidad*preciounitario;
			}else 
			{
				var total = null;
			}		
		}else
		{
			var total = null;
		}
		
		
        $("#preciototal").val(total);
    });
	$("#cantidad").keyup(function () {
        var cantidad = $(this).val();
		var preciounitario = $("#preciounitario").val();
		if(cantidad>0)
		{
			if(preciounitario>0)
			{
				var total = cantidad*preciounitario;
			}else
			{
				var total = null;
			}		
		}else
		{
			var total = null;
		}
        $("#preciototal").val(total);
    });
});
</script>

</html>