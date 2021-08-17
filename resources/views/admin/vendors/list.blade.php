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
                  <h5>Listado de Proveedores </h5>
              </div>
              <div class="ibox-content">

                <form method="GET" action="{{ route('admin.vendors.list') }}" id="mainForm">
                  <input type="hidden" name="order_col" value="{{$order_col}}" id="order_col" />
                  <input type="hidden" name="order" value="{{$order}}" id="order" />

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group"><input name="q" placeholder="Proveedor a buscar" type="text" class="form-control form-control-sm" value="{{$q}}">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-sm btn-primary">Buscar</button>
                              </span>
                            </div>
                            <br>
                        </div>
                    </div>

                  </form>

                  <div class="table-responsive">
                      <table class="table table-striped">
                          <thead>
                          <tr>
                              <th></th>
                              <th>Nombre {!! Helper::orderColumns('name',$order_col,$order) !!}</th>
                              <th>Empresa {!! Helper::orderColumns('company_name',$order_col,$order) !!}</th>
                              <th>Email {!! Helper::orderColumns('email',$order_col,$order) !!}</th>
                              <th>Teléfono</th>
                              <th>Contacto {!! Helper::orderColumns('contact_name',$order_col,$order) !!}</th>
                              <th>Web {!! Helper::orderColumns('website',$order_col,$order) !!}</th>
                              <th>Acciones</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($vendors as $vendor)
                              <tr>
                                <td>{{ $vendor->id }}</td>
                                <td>{{ $vendor->name }}</td>
                                <td>{{ $vendor->company_name }}</td>
                                <td>{{ $vendor->email }}</td>
                                <td>{{ $vendor->phone }}</td>
                                <td>{{ $vendor->contact_name }}</td>
                                <td>{{ $vendor->website }}</td>
                                <td>
                                  <a href="{{ route('admin.vendors.edit', ['id'=>$vendor->id]) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>


                  @if ($vendors->hasMorePages() || $vendors->lastPage())
                  <div class="row">
                      <div class="col-12">
                          {{ $vendors->appends( Request::except('page') )->links() }}
                      </div>
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
