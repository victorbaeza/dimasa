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
                    <h5>Listado de Clientes </h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-3">
                            <form method="GET" action="{{ route('admin.client.list') }}" id="searchForm">
                                <input type="hidden" name="order_col" value="{{$order_col}}" id="order_col" />
                                <input type="hidden" name="order" value="{{$order}}" id="order" />
                                <div class="input-group">
                                    <input name="q" placeholder="Cliente a buscar" type="text" class="form-control form-control-sm" value="{{$q}}">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-sm btn-primary">Buscar</button>
                                    </span>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nombre {!! Helper::orderColumn('name',$order_col,$order) !!}</th>
                                <th>Apellidos {!! Helper::orderColumn('surname',$order_col,$order) !!}</th>
                                <th>Email {!! Helper::orderColumn('email',$order_col,$order) !!}</th>
                                <th>Estado {!! Helper::orderColumn('active',$order_col,$order) !!}</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->surname}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>
                                        @if($client->active)
                                            <button type="button" class="btn btn-xs btn-rounded btn-primary">Activo</button>
                                        @else
                                            <button type="button" class="btn btn-xs btn-rounded btn-danger">Desactivo</button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($client->professional_pending_validation)
                                          <a href="/admin/clients/{{$client->id}}/professional_validate" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Verificar</a>
                                        @endif
                                        <a href="/admin/clients/{{$client->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a>
                                        @if($client->active)
                                            <a href="/admin/clients/{{$client->id}}/deactivate" class="btn btn-sm btn-danger botonAlerta">Desactivar</a>
                                        @else
                                            <a href="/admin/clients/{{$client->id}}/activate" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Activar</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($clients->hasMorePages() || $clients->lastPage())
                        <div class="row">
                            {{ $clients->appends( Request::except('page') )->links() }}
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
        $(function() {
            orderColumn();
        });
    </script>
@stop
