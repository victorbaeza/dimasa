@extends('layouts.admin.main')
@php($title = 'Listado ofertas de productos')
{{-- css --}}
@section('extracss')
@stop

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Listado de Ofertas de Productos </h5>
                </div>
                <div class="ibox-content">
                    <div class="float-right">
                        <a href="{{route('admin.products.offers.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-check-square-o"></i> Crear Nuevo</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID {!! Helper::orderColumns('id',$order_col,$order) !!}</th>
                                <th>Fecha Inicio {!! Helper::orderColumns('start_date',$order_col,$order) !!}</th>
                                <th>Fecha Fin {!! Helper::orderColumns('end_date',$order_col,$order) !!}</th>
                                <th>Descuento {!! Helper::orderColumns('discount',$order_col,$order) !!}</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($offers as $offer)
                                <tr>
                                    <td>{{$offer->id}}</td>
                                    <td>{{$offer->start_date}}</td>
                                    <td>{{$offer->end_date}}</td>
                                    <td>
                                        @if($offer->discount_type == DiscountType::ABSOLUTE()->getValue())
                                            <span>{{$offer->discount}}€</span>
                                        @else
                                            <span>{{$offer->discount}}%</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('admin.products.offers.delete', $offer->id)}}" method="POST" data-id="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('admin.products.offers.edit', $offer->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($offers->hasMorePages() || $offers->lastPage())
                        <div class="row">
                            <?php echo $offers->render(); ?>
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
                if(confirm('¿Seguro quieres borrar la oferta?')){
                    $(this).off('submit');
                    $(this).trigger('submit');
                }
            })
        });
    </script>
@stop
