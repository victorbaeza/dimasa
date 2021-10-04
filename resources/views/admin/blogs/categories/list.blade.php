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
                  <h5>Listado de Categorías de Blogs </h5>
              </div>
              <div class="ibox-content">
                  <div class="row">
                  </div>
                  <div class="float-right">
                    <a href="{{ route('admin.blog.category.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-check-square-o"></i> Crear Nuevo</a>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-striped">
                          <thead>
                          <tr>
                              <th>Id</th>
                              <th>Categoría</th>
                              <th>Acciones</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($categories as $category)
                              <tr>
                                  <td>{{$category->id}}</td>
                                  <td>{{$category->name}}</td>
                                  <td>
                                      <form action="{{route('admin.blog.category.delete', $category->id)}}" method="POST" data-id="delete-form">
                                          @csrf
                                          @method('DELETE')
                                          <a href="{{route('admin.blog.category.edit', $category->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a>
                                          <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                      </form>
                                  </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>

                  @if ($categories->hasMorePages() || $categories->lastPage())
                  <div class="row">
                      {{ $categories->appends( Request::except('page') )->links() }}
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
        $(function(){
            $('[data-id="delete-form"]').on('submit', function(event){
                event.preventDefault();
                if(confirm('¿Seguro quieres borrar el blog?')){
                    $(this).off('submit');
                    $(this).trigger('submit');
                }
            })
        })
    </script>
@stop
