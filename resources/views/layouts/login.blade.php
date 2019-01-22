<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">


    <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->

    <!-- BEGIN VENDOR CSS-->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <!-- font icons-->
    <link href="{{ asset('fonts/icomoon.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('fonts/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendors/css/extensions/pace.css') }}" rel="stylesheet" type="text/css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link href="{{ asset('css/bootstrap-extended.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet" type="text/css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link href="{{ asset('css/core/menu/menu-types/vertical-menu.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/core/menu/menu-types/vertical-overlay-menu.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/core/colors/palette-gradient.css') }}" rel="stylesheet" type="text/css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- END Custom CSS-->
</head>

<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header no-border">
                                <div class="card-title text-xs-center">
                                    <div class="p-1"><img src={{asset('images/logo/robust-logo-dark.png')}} alt="branding logo"></div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>@yield('titulo')</span></h6>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    @yield('formulario')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</body>
<!-- BEGIN VENDOR JS-->
<script type="text/javascript" src="{{ asset('assets/css/style.css') }}"></script>
<script src="{{ asset('js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>
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
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('js/scripts/pages/dashboard-lite.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

</html>