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
                  <h5>Sitemaps </h5>
              </div>
              <div class="ibox-content">
                <form method="GET" action="{{ route('admin.seo.list') }}" id="searchForm">
                  <input type="hidden" name="order_col" value="{{$order_col}}" id="order_col" />
                  <input type="hidden" name="order" value="{{$order}}" id="order" />
                </form>


                  @include('layouts.admin.notifications') <br>

                  @if(sizeof($errors)>0)
                    {!! Helper::notificationsValidator($errors) !!}<br>
                  @endif

                <form method="POST" action="/admin/seo/sitemaps/nuevo" id="nuevoForm">
                @csrf
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                          <thead>
                          <tr>
                              <th>Id</th>
                              <th>URL (sin incluir raíz) {!! Helper::orderColumn('loc',$order_col,$order) !!}</th>
                              <th>Changefreq</th>
                              <th>Priority {!! Helper::orderColumn('priority',$order_col,$order) !!}</th>
                              <th>LastMod {!! Helper::orderColumn('lastmod',$order_col,$order) !!}</th>
                              <th>Acciones</th>
                          </tr>
                          </thead>
                          <tbody id="sitemapTable">

                            @foreach($sitemaps as $sitemap)
                              <tr>
                                <td>{{$sitemap->id}}</td>
                                <td><input type="text" class="form-control input-sm" value="{{$sitemap->loc}}" id="url_{{$sitemap->id}}" readonly></td>
                                <td><select class="form-control" id="changefreq_{{$sitemap->id}}" disabled>
                                      <option value="">  (ninguno)  </option>
                                      @foreach(SitemapChangefreq::all() as $changefreq)
                                        <option value="{{$changefreq->id}}" @if($changefreq->id==$sitemap->changefreq_id) selected @endif>{{$changefreq->name}}</option>
                                      @endforeach
                                    </select></td>
                                <td><input type="number" class="form-control input-sm" min="0" max="1" step="0.1" value="{{$sitemap->priority}}" id="priority_{{$sitemap->id}}" readonly></td>
                                <td><input type="datetime-local" class="form-control input-sm" value="{{date('Y-m-d\TH:i', strtotime($sitemap->lastmod))}}" id="lastmod_{{$sitemap->id}}" readonly></td>
                                <td><a href="#" class="btn btn-xs btn-warning editarSitemap" data-id="{{$sitemap->id}}"><i class="fa fa-pencil-square-o"></i> Editar</a>
                                    <a href="#" class="btn btn-xs btn-danger botonAlerta borrarSitemap" id="botonBorrar_{{$sitemap->id}}" data-id="{{$sitemap->id}}"><i class="fa fa-trash"></i> Eliminar</a>
                                    <a href="#" class="btn btn-xs btn-success guardarSitemap" id="botonGuardar_{{$sitemap->id}}" data-id="{{$sitemap->id}}" style="display:none;"><i class="fa fa-check"></i> Guardar</a></td>
                              </tr>
                            @endforeach

                          </tbody>
                      </table>
                    </div>
                    <a href="#" class="btn btn-primary" id="addURL">Agregar URL</a>
                    <a href="#" class="btn btn-success" id="guardarCambios" data-form="nuevoForm">Guardar URLs</a><br>
                  </form>

                  @if ($sitemaps->hasMorePages() || $sitemaps->lastPage())
                    <br>
                    <div class="row" style="margin-left:20px;">
                        <?php echo $sitemaps->render(); ?>
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


// Función para agregar más sitemaps
$('#addURL').click(function(e){
  e.preventDefault();
  var html = '<tr><td></td>';
  html += '<td><input type="text" class="form-control input-sm" name="add_url[]" required></td>';
  html += '<td><select class="form-control" name="add_changefreq[]"><option value="">  (ninguno)  </option>@foreach(SitemapChangefreq::all() as $freq) <option value="{{$freq->id}}">{{$freq->name}}</option> @endforeach</select></td>';
  html += '<td><input type="number" class="form-control input-sm" min="0" max="1" step="0.01" name="add_priority[]" value="0.5" required></td>';
  html += '<td><input type="datetime-local" class="form-control input-sm" name="add_lastmod[]" value="{{date('Y-m-d\TH:i')}}" required></td></tr>';
  $(html).appendTo('#sitemapTable');
});

$('#guardarCambios').click(function(e){
  e.preventDefault();
  var form = $(this).data('form');
  $('#'+form).submit();
});

// Funcion para editar el Sitemap
$('.editarSitemap').click(function(e){
  e.preventDefault();
  var id = $(this).data('id');
  $('#botonBorrar_'+id).remove();

  // $('#url_'+id).prop('readonly',false);
  $('#changefreq_'+id).prop('disabled', false);
  $('#priority_'+id).prop('readonly',false);
  $('#lastmod_'+id).prop('readonly',false);

  $('#botonGuardar_'+id).show();
});

// Funcion para guardar cambios de un sitemap
$('.guardarSitemap').click(function(e){
  e.preventDefault();
  var id = $(this).data('id');

  var action = '/ajax/admin/seo/sitemaps/editar';
  var url = $('#url_'+id).val();
  var changefreq = $('#changefreq_'+id).val();
  var priority = $('#priority_'+id).val();
  var lastmod = $('#lastmod_'+id).val();

  var data = {id:id,url:url,changefreq:changefreq,priority:priority,lastmod:lastmod};
  $.ajax({
    type: "POST",
    url: action,
    data: data,
      success: function (result) {
        if(result=='ok'){
          alert('Los datos del sitemap se han modificado correctamente!');
        } else {
          alert(result);
        }
    },
  });

});

</script>
@stop
