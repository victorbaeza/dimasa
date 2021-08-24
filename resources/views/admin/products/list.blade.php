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
                  <h5>Listado de Productos </h5>
              </div>
              <div class="ibox-content">

                <form method="GET" action="{{ route('admin.products.list') }}" id="mainForm">
                  <input type="hidden" name="order_col" value="{{$order_col}}" id="order_col" />
                  <input type="hidden" name="order" value="{{$order}}" id="order" />

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group"><input name="q" placeholder="Producto a buscar" type="text" class="form-control form-control-sm" value="{{$q}}">
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
                              <th>Nombre {!! Helper::OrderColumn('name',$order_col,$order) !!}</th>
                              <th>Categoría </th>
                              <th>SKU {!! Helper::OrderColumn('sku',$order_col,$order) !!}</th>
                              <th>Stock {!! Helper::OrderColumn('stock',$order_col,$order) !!}</th>
                              <th>Precio {!! Helper::OrderColumn('price',$order_col,$order) !!}</th>
                              <th>Acciones</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($products as $product)
                              <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>@if($product->Category) {{ $product->Category->name }} @endif</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ Helper::showPrice($product->price) }}</td>
                                <td>
                                  <a href="{{ route('admin.products.edit', ['id'=>$product->id]) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>


                  @if ($products->hasMorePages() || $products->lastPage())
                  <div class="row">
                      <div class="col-12">
                          {{ $products->appends( Request::except('page') )->links() }}
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
