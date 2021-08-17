<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@if(isset($title)){{$title}}@else {{ config('app.name') }} - Panel de Administración @endif</title>
    <link rel="shortcut icon" href="/vendor/img/favicon.png" />

    <link href="/vendor/css/bootstrap.css" rel="stylesheet">
    <link href="/vendor/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/vendor/js/plugins/sweetalert/lib/sweet-alert.css" rel="stylesheet">

    <link href="/vendor/css/animate.css" rel="stylesheet">
    <link href="/vendor/css/style.css" rel="stylesheet">
    @yield('extracss')

</head>
<body>

<div id="wrapper">


@include('layouts.admin.sidebar')


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    {{-- <form role="search" class="navbar-form-custom" method="post" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form> --}}
                </div>
                <ul class="nav navbar-top-links navbar-right">
                  {{-- <li class="dropdown">
                      <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                          <i class="fa fa-bell"></i>  <span class="label label-primary" id="num_notificaciones">X</span>
                      </a>
                      <ul class="dropdown-menu dropdown-alerts">
                          <li>
                              <a href="#" class="dropdown-item">
                                  <div>
                                      <i class="fa fa-envelope fa-fw"></i> Tienes 8 mensajes sin leer
                                      <span class="float-right text-muted small">Hace 2 horas</span>
                                  </div>
                              </a>
                          </li>
                          <li class="dropdown-divider"></li>
                          <li>
                              <a href="#" class="dropdown-item">
                                  <div>
                                      <i class="fa fa-file-text fa-fw"></i> Tienes <b>X</b> alertas nuevas
                                      <span class="float-right text-muted small">Hace 4 minutos</span>
                                  </div>
                              </a>
                          </li>
                          <li class="dropdown-divider"></li>
                          <li>
                              <div class="text-center link-block">
                                  <a href="#" class="dropdown-item">
                                      <strong>Ver todas las alertas</strong>
                                      <i class="fa fa-angle-right"></i>
                                  </a>
                              </div>
                          </li>
                      </ul>
                  </li> --}}
                  <li style="padding: 20px">
                      <span class="m-r-sm text-muted welcome-message">Panel de Administración - {{ config('app.name') }}</span>
                  </li>
                    <li>
                        <a href="{{route('admin.logout')}}">
                            <i class="fa fa-sign-out"></i> Cerrar Sesión
                        </a>
                    </li>
                </ul>

            </nav>
        </div>


        <div class="wrapper wrapper-content animated fadeInRight">
          @include('layouts.admin.notifications')
          @yield('content')
        </div>



        <div class="footer">
            <div class="pull-right">
                {{ date('Y') }} &copy; Panel privado de administración - Todos los derechos reservados &copy; - Creado por <a href="https://www.ibermedia.com" target="_blank">Ibermedia</a>
            </div>
        </div>

    </div>
</div>

<!-- Main scripts -->
<script src="/vendor/js/jquery-3.1.1.min.js"></script>
<script src="/vendor/js/popper.min.js"></script>
<script src="/vendor/js/bootstrap.min.js"></script>
<script src="/vendor/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/vendor/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="/vendor/js/inspinia.js"></script>
<script src="/vendor/js/plugins/pace/pace.min.js"></script>
{{-- <script src="/vendor/js/plugins/sweetalert2.all.min.js"></script> --}}
<script src="/vendor/js/plugins/sweetalert/lib/sweet-alert.min.js"></script>
<script src="/vendor/js/main.js"></script>
{{-- <script src="/scripts/app.js"></script> --}}

@yield('scripts')

</body>
</html>
