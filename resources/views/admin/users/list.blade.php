@extends('layouts.admin.main')

{{-- css --}}
@section('extracss')
@stop

{{-- Content --}}
@section('content')
  <div class="row">
      <div class="col-lg-12">
          <div class="ibox ">
              <div class="ibox-title">
                  <h5>Listado de Usuarios </h5>
              </div>
              <div class="ibox-content">
                  <div class="row">
                      <div class="col-sm-3">
                        <form method="GET" action="{{route('admin.user.list')}}" id="searchForm">
                          <input type="hidden" name="order_col" value="{{$order_col}}" id="order_col" />
                          <input type="hidden" name="order" value="{{$order}}" id="order" />

                          <div class="input-group"><input name="q" placeholder="Usuario a buscar" type="text" class="form-control form-control-sm" value="{{$q}}"> <span class="input-group-append"> <button type="submit" class="btn btn-sm btn-primary">Buscar
                          </button> </span></div>
                          <br>
                        </form>
                      </div>
                  </div>

                  <div class="table-responsive">
                      <table class="table table-striped">
                          <thead>
                          <tr>
                              <th></th>
                              <th>Usuario {!! Helper::orderColumns('user',$order_col,$order) !!}</th>
                              <th>Nombre {!! Helper::orderColumns('name',$order_col,$order) !!}</th>
                              <th>Email {!! Helper::orderColumns('email',$order_col,$order) !!}</th>
                              <th>Estado {!! Helper::orderColumns('active',$order_col,$order) !!}</th>
                              <th>Acciones</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($users as $user)
                              <tr>
                                <td><img src="/vendor/img/user.png" style="max-height:25px;"></td>
                                <td>{{$user->user}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                  @if($user->active)<button type="button" class="btn btn-xs btn-rounded btn-primary">Activo</button>
                                  @else <button type="button" class="btn btn-xs btn-rounded btn-danger">Desactivo</button> @endif
                                  </td>
                                <td><a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a>
                                  @if($user->active)<a href="{{route('admin.user.deactivate', $user->id)}}" class="btn btn-sm btn-danger botonAlerta">Desactivar</a>
                                  @else <a href="{{route('admin.user.activate', $user->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Activar</a> @endif
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>

                  @if ($users->hasMorePages() || $users->lastPage())
                  <div class="row">
                      <?php echo $users->appends(['q' => $q])->render(); ?>
                  </div>
                  @endif

              </div>
          </div>
      </div>

  </div>
@stop

{{-- Scripts --}}
@section('scripts')
<script>
  $(document).ready(function() {
    orderColumn();
  });
</script>
@stop
