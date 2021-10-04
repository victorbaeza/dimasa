@extends('layouts.admin.main')

{{-- css --}}
@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop

{{-- Content --}}
@section('content')

  <form method="POST" action="/admin/blogs/categories/edit">
  @csrf
  <input type="hidden" name="id" value="{{$category->id}}" />

  <div class="row">
      <div class="col-lg-12">
          <div class="ibox ">
              <div class="ibox-title">
                  <h5>Editar Categoría Blog </h5>
              </div>

              <div class="ibox-content">
                  <div class="row">
                      <div class="col-xs-12 col-md-6">
                          <div class="form-group">
                              <label>Nombre</label>
                              <input type="text" name="name" placeholder="Nombre de la categoría" class="form-control" value="{{ $category->name }}" required>
                          </div>
                          <div class="form-group">
                              <label>Descripción</label>
                              <textarea type="text" name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                          </div>
                      </div>
                      <div class="col-xs-12 col-md-6">
                          <div class="row">
                              <div class="col-12">
                                  <div class="form-group">
                                      <label class="font-bold">Keywords</label>
                                      <input type="text" name="seo_keywords" class="form-control" value="{{ $category->seo_keywords }}" placeholder="keyword 1, keyword 2, keyword 3...">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-12">
                                  <div class="form-group">
                                      <label class="font-bold">Título SEO</label>
                                      <input type="text" name="seo_title" class="form-control" value="{{ $category->seo_title }}">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-12">
                                  <div class="form-group">
                                      <label class="font-bold">Descripción SEO</label>
                                          <textarea name="seo_description" class="form-control">{{ $category->seo_description }}</textarea>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-4 col-sm-offset-2">
                      <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-check"></i> Guardar Cambios</button>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

</form>
@stop

{{-- Scripts --}}
@section('scripts')
    <script src="/vendor/select2-4.0.6/js/select2.js"></script>
    <script>
        $(function(){
            // toggleLanguageInputs(false);
            // toggleKeywordsInput();
        })
    </script>
@stop
