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
                    <h5>Listado de Métodos de envío </h5>
                </div>
                <div class="ibox-content">
                    <div class="float-right">
                        <a href="{{route('admin.shipment.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-check-square-o"></i> Crear Nuevo</a>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <form method="GET" action="{{ route('admin.shipment.list') }}" id="searchForm">
                                <input type="hidden" name="order_col" value="{{$order_col}}" id="order_col" />
                                <input type="hidden" name="order" value="{{$order}}" id="order" />
                                <div class="input-group">
                                    <input name="q" placeholder="Número a buscar" type="text" class="form-control form-control-sm" value="{{$q}}">
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
                                <th>ID {!! Helper::orderColumn('id',$order_col,$order) !!}</th>
                                <th>Descripción {!! Helper::orderColumn('description',$order_col,$order) !!}</th>
                                <th>Coste {!! Helper::orderColumn('cost',$order_col,$order) !!}</th>
                                <th>Mínimo Gratuito {!! Helper::orderColumn('minimum_free',$order_col,$order) !!}</th>
                                <th>Por defecto {!! Helper::orderColumn('default',$order_col,$order) !!}</th>
                                <th>Activo {!! Helper::orderColumn('active',$order_col,$order) !!}</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shipments as $shipment)
                                <tr>
                                    <td>{{$shipment->id}}</td>
                                    <td>{{$shipment->description}}</td>
                                    <td>{{$shipment->cost}}</td>
                                    <td>{{$shipment->minimum_free}}</td>
                                    <td>
                                        @if($shipment->default)
                                            <i class="fa fa-star fa-2x ml-3"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if($shipment->active)
                                            <button type="button" class="btn btn-xs btn-rounded btn-primary">Visible</button>
                                        @else
                                            <button type="button" class="btn btn-xs btn-rounded btn-danger">Desactivado</button>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('admin.shipment.delete', $shipment->id)}}" method="POST" data-id="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.shipment.edit', ['id' => $shipment->id]) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($shipments->hasMorePages() || $shipments->lastPage())
                        <div class="row">
                            @php
                                $shipments->appends(['q' => $q])->render()
                            @endphp
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
            $('[data-id="delete-form"]').on('submit', function(event){
                event.preventDefault();
                if(confirm('¿Seguro quieres borrar el método de envío?')){
                    $(this).off('submit');
                    $(this).trigger('submit');
                }
            })
        });
    </script>
@stop
