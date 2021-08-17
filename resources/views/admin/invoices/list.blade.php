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
                    <h5>Listado de Facturas </h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-3">
                            <form method="GET" action="{{ route('admin.invoices.list') }}" id="searchForm">
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
                                <th>Número {!! Helper::orderColumns('name',$order_col,$order) !!}</th>
                                <th>Cliente {!! Helper::orderColumns('surname',$order_col,$order) !!}</th>
                                <th>Fecha {!! Helper::orderColumns('email',$order_col,$order) !!}</th>
                                <th>Total {!! Helper::orderColumns('total',$order_col,$order) !!}</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{$invoice->number}}</td>
                                    <td>{{$invoice->name}}</td>
                                    <td>{{ Helper::showDate($invoice->date) }}</td>
                                    <td>{{ Helper::showPrice($invoice->total) }}</td>
                                    <td>
                                      {{-- <a href="{{ route('admin.invoices.edit', ['id' => $order->id]) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($invoices->hasMorePages() || $invoices->lastPage())
                        <div class="row">
                            <?php echo $invoices->appends(['q' => $q])->render(); ?>
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
    </script>
@stop
