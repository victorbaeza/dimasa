@extends('layouts.admin.main')

{{-- css --}}
@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop
{{-- Content --}}
@section('content')

    <form method="POST" action="/admin/blogs/create" enctype="multipart/form-data">
    @csrf

    <div class="wrapper wrapper-content animated fadeInRight blog">
      <div class="row">
        <div class="col-md-8">
          <div class="ibox-title">
              <h5>NUEVO BLOG</h5>
              <div class="ibox-tools">
              </div>
          </div>

          <div class="ibox-content">
              <div class="form-group">
                  <label class="required"><b>Titulo</b></label>
                  <input type="text" name="title" placeholder="Título del blog" class="form-control" value="{{ old('title') }}">
              </div>
              <div class="form-group">
                  <label><b>Descripción</b></label>
                  <textarea name="description" class="form-control" rows="2" style="resize:none;">{{ old('description') }}</textarea>
              </div>
              <div class="form-group">
                  <label class="required"><b>Contenido</b></label>
                  <textarea name="content" class="form-control content js-rich-text" rows="10">{{ old("content") }}</textarea>
              </div>
          </div>
          <br>
          <center><button class="btn btn-success dim" type="submit"><i class="fa fa-check"></i> Crear Blog</button></center>
        </div>

        <div class="col-md-4">
          <div class="ibox">
          <div class="ibox-title">
              <h5>OPCIONES</h5>
              <div class="ibox-tools">
              </div>
          </div>
          <div class="ibox-content">
            <div class="form-group">
                <label class="required"><b>Categoría</b></label>
              <select class="form-control js-select2" name="category[]" required multiple>
                @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group row">
                  <label class="col-lg-3 col-form-label"><b>Visible</b></label>
                  <div class="custom-file col-lg-3 mt-2">
                    <input type="checkbox" class="i-checks" name="active" value="1" checked>
                  </div>
            </div>
              <div class="row form-group">
                  <label class="col-form-label font-bold col-sm-3">Recomendado</label>
                  <div class="custom-file col-sm-3 col-xs-12 mt-2">
                      <input type="checkbox" class="i-checks" name="featured"  @if(old('featured')) value="1" checked @endif>
                  </div>
              </div>
            <div class="row">
              <label class="col-lg-4 col-form-label required"><b>Imagen Portada</b></label>
            </div>
            <div class="row">
              <div class="custom-file col-lg-8 ml-2">
                  <input id="logo" type="file" class="custom-file-input js-image-input" name="image" accept="image/png, image/jpg, image/jpeg" required>
                  <label for="logo" class="custom-file-label js-image-label">Elegir imagen...</label>
              </div>
            </div>
              <div class="row mt-3 mb-4">
                  <div class="col-12">
                      <div class="ibox-title">
                          <h5>SEO</h5>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                          <label class="font-bold">Keywords</label>
                          <input type="text" name="seo_keywords" class="form-control" value="{{ old('seo_keywords') }}" placeholder="keyword 1, keyword 2, keyword 3...">
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                          <label class="font-bold">Título SEO</label>
                          <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                          <label class="font-bold">Descripción SEO</label>
                              <textarea name="seo_description" class="form-control">{{ old('seo_description') }}</textarea>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="row">
            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
      </div>
      </div>
    </div>
</form>
@stop

{{-- Scripts --}}
@section('scripts')
<script src="/vendor/js/plugins/tinymce/tinymce.min.js"></script>
<script src="/vendor/select2-4.0.6/js/select2.js"></script>
<script>
    $(function(){
        limitImageSize();
        // toggleLanguageInputs();
        // toggleKeywordsInput();
        $('.js-select2').select2();
    });
</script>
@stop
