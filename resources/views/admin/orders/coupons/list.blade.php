@extends('layouts.admin.main')
@php($title = 'Listado Cupones')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Listado de Cupones </h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                    </div>
                    <div class="float-right">
                        <a href="{{route('admin.coupons.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-check-square-o"></i> Crear Nuevo</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID {!! Helper::orderColumns('id',$order_col,$order) !!}</th>
                                <th>Código {!! Helper::orderColumns('code', $order_col, $order) !!}</th>
                                <th>Fecha Inicio {!! Helper::orderColumns('start_date',$order_col,$order) !!}</th>
                                <th>Fecha Fin {!! Helper::orderColumns('end_date',$order_col,$order) !!}</th>
                                <th>Descuento {!! Helper::orderColumns('discount',$order_col,$order) !!}</th>
                                <th>Gasto mínimo {!! Helper::orderColumns('minimum_price', $order_col, $order) !!}</th>
                                <th>Límite de usos {!! Helper::orderColumns('use_limit', $order_col, $order) !!}</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{$coupon->id}}</td>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{$coupon->start_date}}</td>
                                    <td>{{$coupon->end_date}}</td>
                                    <td>
                                        @if($coupon->discount_type == DiscountType::ABSOLUTE()->getValue())
                                            <span>{{$coupon->discount}}€</span>
                                        @else
                                            <span>{{$coupon->discount}}%</span>
                                        @endif
                                    </td>
                                    <td>{{$coupon->minimum_price}}</td>
                                    <td>{{$coupon->use_limit}}</td>
                                    <td>
                                        <form action="{{route('admin.coupons.delete', $coupon->id)}}" method="POST" data-id="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('admin.coupons.edit', $coupon->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($coupons->hasMorePages() || $coupons->lastPage())
                        <div class="row">
                            <?php echo $coupons->render(); ?>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            orderColumn();
            $('[data-id="delete-form"]').on('submit', function(event){
                event.preventDefault();
                if(confirm('¿Seguro quieres borrar el cupón?')){
                    $(this).off('submit');
                    $(this).trigger('submit');
                }
            })
        });
    </script>
@stop
