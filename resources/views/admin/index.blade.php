@extends('layouts.admin.main')

{{-- css --}}
@section('extracss')
@stop
{{-- Content --}}
@section('content')

  <div class="row">

    <div class="col-lg-3">
      <div class="ibox ">
        <div class="ibox-title">
          <div class="ibox-tools">
          </div>
          <h5>Solicitudes de contacto</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{ $estadisticas['num_contactos'] }}</h1>
          <small>Últimos 7 días</small>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="ibox ">
        <div class="ibox-title">
          <div class="ibox-tools">
          </div>
          <h5>Número de pedidos realizados</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{ $estadisticas['num_pedidos'] }}</h1>
          <small>Últimos 7 días</small>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="ibox ">
        <div class="ibox-title">
          <div class="ibox-tools">
          </div>
          <h5>Número de clientes registrados</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{ $estadisticas['num_registrados'] }}</h1>
          <small>Últimos 7 días</small>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="ibox ">
        <div class="ibox-title">
          <div class="ibox-tools">
          </div>
          <h5>Número de clientes profesionales</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{ $estadisticas['num_clientes_profesionales'] }}</h1>
          <small>Total de clientes profesionales</small>
        </div>
      </div>
    </div>

  </div>



  <div class="row">

      <div class="col-lg-12">
          <div class="ibox ">
              <div class="ibox-title">
                  <h5>Slider </h5>
                  <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" class="dropdown-item">Config option 1</a>
                        </li>
                        <li><a href="#" class="dropdown-item">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
              </div>
              <div class="ibox-content">
                  <div class="row">
                      <div class="col-sm-3">
                      </div>
                  </div>

                  <div class="text-right"><a href="#" class="btn btn-sm btn-primary" id="botonAddSlider"><i class="fa fa-plus-square"></i> Agregar nuevo</a></div>
                  <br>
                  <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead>
                          <tr>
                              <th>Nº</th>
                              <th>Imagen</th>
                              <th>Titulo</th>
                              <th>URL</th>
                              <th>Estado</th>
                              <th>Acciones</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($sliders as $slider)
                              <tr>
                                <td>{{ $slider->id }}</td>
                                <td><img src="{{ $slider->Image() }}" style="max-height:50px;"></td>
                                <td>{{ $slider->title}}</td>
                                <td>{{ $slider->url }}</td>
                                <td>@if($slider->active) <b class="btn btn-info btn-xs">Activo</b> @else <b class="btn btn-danger btn-xs">Desactivado</b> @endif</td>
                                <td>@if($slider->active) <a href="/admin/home/slider/desactivar/{{$slider->id}}" class="btn btn-warning btn-xs"><i class="fa fa-times"></i> Desactivar</a>
                                @else <a href="/admin/home/slider/activar/{{$slider->id}}" class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Activar</a> @endif
                                    <a href="/admin/home/slider/borrar/{{$slider->id}}" class="btn btn-xs btn-danger">Eliminar</a></td>
                              </tr>
                            @endforeach
                            <form method="POST" action="/admin/home/slider/nuevo" enctype="multipart/form-data">
                            @csrf
                              <tr id="trAddSlider" style="display:none;">
                                <td></td>
                                <td><input name="image" type="file" class="form-control" accept=".png,.jpg,.jpeg" required></td>
                                <td><input name="title" type="text" class="form-control"></td>
                                <td><input name="url" type="text" class="form-control"></td>
                                <td></td>
                                <td><button type="submit" class="btn btn-xs btn-success">Guardar cambios</button></td>
                              </tr>
                            </form>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>


      {{-- Datos WEB --}}
      {{-- <div class="col-lg-12">
          <div class="ibox ">
              <div class="ibox-title">
                  <h5>Datos WEB </h5>
                  <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" class="dropdown-item">Config option 1</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
              </div>
              <div class="ibox-content">

                  <div class="table-responsive">
                      <table class="table table-bordered">
                          <tbody>
                            <tr>
                              <td>Email:</td>
                              <td>{{$webdata->email}}</td>
                            </tr>
                            <tr>
                              <td>Teléfono:</td>
                              <td>{{$webdata->phone}}</td>
                            </tr>
                            <tr>
                              <td>Email:</td>
                              <td>{{$webdata->email}}</td>
                            </tr>
                      </table>
                  </div>
              </div>
          </div>
      </div> --}}

  </div>

@stop
{{-- Scripts --}}
@section('scripts')
<script>
  $(document).ready(function() {
    $('#botonAddSlider').click(function(e){
      e.preventDefault();
      $('#trAddSlider').show();
    });
  });
</script>
@stop
