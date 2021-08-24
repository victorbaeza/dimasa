@extends('layouts.admin.main')

{{-- css --}}
@section('extracss')
  <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Listado de Pedidos </h5>
                </div>
                <div class="ibox-content">
                  <form method="GET" action="{{ route('admin.orders.list') }}" id="searchForm">
                      <input type="hidden" name="order_col" value="{{$order_col}}" id="order_col" />
                      <input type="hidden" name="order" value="{{$order}}" id="order" />

                      <div class="row">
                          <div class="col-sm-2">
                            <select class="form-control" id="select_estado" name="e">
                              <option></option>
                              @foreach (OrderStatus::get() as $status)
                                <option value="{{$status->id}}" @if(isset($e) && $status->id==$e) selected @endif>{{ ($status->name) }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group">
                              <input name="c" placeholder="Nombre de cliente" type="text" class="form-control form-control-sm" value="{{$c}}">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group">
                              <input name="q" placeholder="Número a buscar" type="text" class="form-control form-control-sm" value="{{$q}}">
                              <span class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary">Buscar</button>
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
                                <th>Número {!! Helper::orderColumn('name',$order_col,$order) !!}</th>
                                <th>Estado</th>
                                <th>Forma de pago</th>
                                <th>Cliente {!! Helper::orderColumn('surname',$order_col,$order) !!}</th>
                                <th>Email</th>
                                <th>Fecha {!! Helper::orderColumn('email',$order_col,$order) !!}</th>
                                <th>Observaciones</th>
                                <th>Total {!! Helper::orderColumn('active',$order_col,$order) !!}</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->number}}</td>
                                    <td>{{$order->Status->name}}</td>
                                    <td>{{$order->PaymentForm->name}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ Helper::showDate($order->date) }}</td>
                                    <td>{{ $order->observations }}</td>
                                    <td>{{ Helper::showPrice($order->total) }}</td>
                                    <td>
                                        <form action="{{route('admin.orders.delete', $order->id)}}" method="POST" data-id="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.orders.edit', ['id' => $order->id]) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($orders->hasMorePages() || $orders->lastPage())
                        <div class="row">
                            {{ $orders->appends( Request::except('page') )->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
@stop

{{-- Scripts --}}
@section('scripts')
  <script src="/vendor/select2-4.0.6/js/select2.js"></script>
    <script>
        $(function() {
          $('#select_estado').select2({
            placeholder: 'Estado del pedido',
          });

            orderColumn();
            $('[data-id="delete-form"]').on('submit', function(event){
                event.preventDefault();
                if(confirm('¿Seguro quieres borrar el pedido?')){
                    $(this).off('submit');
                    $(this).trigger('submit');
                }
            })
        });
    </script>
@stop
