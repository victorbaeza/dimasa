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
                  <h5>Listado de Categorías de Producto </h5>
              </div>
              <div class="ibox-content">

                <form method="GET" action="{{ route('admin.products.categories.list') }}" id="mainForm">
                  <input type="hidden" name="order_col" value="{{$order_col}}" id="order_col" />
                  <input type="hidden" name="order" value="{{$order}}" id="order" />

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group"><input name="q" placeholder="Categoria a buscar" type="text" class="form-control form-control-sm" value="{{$q}}">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-sm btn-primary">Buscar</button>
                              </span>
                            </div>
                            <br>
                        </div>

                        <div class="col-sm-6">
                        </div>

                        <div class="col-sm-3 text-right">
                          <a href="{{ route('admin.products.categories.create') }}" class="btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Crear nuevo</a>
                        </div>
                    </div>

                  </form>

                  <div class="table-responsive">
                      <table class="table table-striped">
                          <thead>
                          <tr>
                              <th></th>
                              <th>Nombre {!! Helper::OrderColumn('name',$order_col,$order) !!}</th>
                              <th>Descripción {!! Helper::OrderColumn('description',$order_col,$order) !!}</th>
                              <th>Categoría padre</th>
                              <th>Acciones</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($categories as $category)
                              <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>@if($category->Parent) {{ $category->Parent->name }} @endif</td>
                                <td>
                                  <a href="{{ route('admin.products.categories.edit', ['id'=>$category->id]) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>


                  @if ($categories->hasMorePages() || $categories->lastPage())
                  <div class="row">
                      <div class="col-12">
                          {{ $categories->appends( Request::except('page') )->links() }}
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
