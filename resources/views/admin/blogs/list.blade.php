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
                  <h5>Listado de Blogs </h5>
              </div>
              <div class="ibox-content">
                  <div class="row">
                      <div class="col-sm-3">
                        <form method="GET" action="/admin/blogs" id="searchForm">
                          <input type="hidden" name="order_col" value="{{$order_col}}" id="order_col" />
                          <input type="hidden" name="order" value="{{$order}}" id="order" />

                          <div class="input-group"><input name="q" placeholder="Blog a buscar" type="text" class="form-control form-control-sm" value="{{$q}}"> <span class="input-group-append"> <button type="submit" class="btn btn-sm btn-primary">Buscar
                          </button> </span></div>
                          <br>
                        </form>
                      </div>
                  </div>

                  <div class="table-responsive">
                      <table class="table table-striped">
                          <thead>
                          <tr>
                              <th>Id</th>
                              <th>Titulo {!! Helper::orderColumns('title',$order_col,$order) !!}</th>
                              <th>Descripcion {!! Helper::orderColumns('description',$order_col,$order) !!}</th>
                              <th>Fecha {!! Helper::orderColumns('created_at',$order_col,$order) !!}</th>
                              <th>Estado {!! Helper::orderColumns('active',$order_col,$order) !!}</th>
                              <th>Acciones</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($blogs as $blog)
                              <tr>
                                  <td>{{$blog->id}}</td>
                                  <td>{{$blog->title}}</td>
                                  <td>{{$blog->description}}</td>
                                  <td>{{ date('d/m/Y', strtotime($blog->created_at)) }}</td>
                                  <td>
                                      @if($blog->active)
                                          <button type="button" class="btn btn-xs btn-rounded btn-primary">Visible</button>
                                      @else
                                          <button type="button" class="btn btn-xs btn-rounded btn-danger">Desactivado</button>
                                      @endif
                                  </td>
                                  <td>
                                      <form action="{{route('admin.blog.delete', $blog->id)}}" method="POST" data-id="delete-form">
                                          @csrf
                                          @method('DELETE')
                                          <a href="{{route('admin.blog.edit', $blog->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a>
                                          <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                      </form>
                                  </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>

                  @if ($blogs->hasMorePages() || $blogs->lastPage())
                  <div class="row">
                      <?php echo $blogs->appends(['q' => $q])->render(); ?>
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
      $('[data-id="delete-form"]').on('submit', function(event){
          event.preventDefault();
          if(confirm('¿Seguro quieres borrar el blog?')){
              $(this).off('submit');
              $(this).trigger('submit');
          }
      })
  });
</script>
@stop
