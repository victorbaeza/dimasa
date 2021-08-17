@extends('layouts.admin.main')
@php($title = 'Listado productos')
{{-- css --}}
@section('extracss')
@stop

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Listado de Productos </h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-3">
                            <form method="GET" action="{{route('admin.products.list')}}" id="searchForm">
                                <input type="hidden" name="order_col" value="{{$order_col}}" id="order_col" />
                                <input type="hidden" name="order" value="{{$order}}" id="order" />
                                <div class="input-group">
                                    <input name="q" placeholder="Producto a buscar" type="text" class="form-control form-control-sm" value="{{$q}}">
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
                                <th>Nombre {!! Helper::orderColumns('name',$order_col,$order) !!}</th>
                                {{-- <th>Descripción {!! Helper::orderColumns('description',$order_col,$order) !!}</th> --}}
                                <th>Precio {!! Helper::orderColumns('price', $order_col, $order) !!}</th>
                                <th>Categoría</th>
                                <th>Estado {!! Helper::orderColumns('active',$order_col,$order) !!}</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    {{-- <td>{{$product->description}}</td> --}}
                                    <td>{{ Helper::showPrice($product->price) }}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>
                                        @if($product->active)
                                            <button type="button" class="btn btn-xs btn-rounded btn-primary">Activo</button>
                                        @else
                                            <button type="button" class="btn btn-xs btn-rounded btn-danger">Desactivo</button>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href="#" class="btn btn-sm btn-info"><i class="fas fa-boxes"></i> Subproductos</a> --}}

                                        <form action="{{route('admin.products.delete', $product->id)}}" method="POST" data-id="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a>
                                            @if($product->active)
                                                <a href="{{route('admin.products.change_availability', ['id' => $product->id, 'active' => false])}}" class="btn btn-sm btn-danger">Desactivar</a>
                                            @else
                                                <a href="{{route('admin.products.change_availability', ['id' => $product->id, 'active' => true])}}" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Activar</a>
                                            @endif
                                            <a href="{{route('admin.products.assign_offers', ['id' => $product->id])}}" class="btn btn-sm btn-light">Ofertas</a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($products->hasMorePages() || $products->lastPage())
                        <div class="row">
                            <?php echo $products->appends(['q' => $q])->render(); ?>
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
                if(confirm('¿Seguro quieres borrar el producto?')){
                    $(this).off('submit');
                    $(this).trigger('submit');
                }
            })
        });
    </script>
@stop
