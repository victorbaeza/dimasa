@extends('layouts.admin.main')

{{-- css --}}
@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop

{{-- Content --}}
@section('content')

    <form method="POST" action="/admin/blogs/edit" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$blog->id}}" />

    <div class="wrapper wrapper-content animated fadeInRight blog">
      <div class="row">
        <div class="col-md-8">
          <div class="ibox-title">
              <h5>EDITAR BLOG - {{$blog->titulo}}</h5>
              <div class="ibox-tools">
              </div>
          </div>
          @include('shared.language_selector')
          <div class="ibox-content">
              <div class="form-group">
                  <label><b>@lang('Titulo')</b></label>
                  @foreach($languages as $lang)
                      @if($loop->first)
                          <input type="text" name="{{$lang}}_title" placeholder="@lang('Titulo del Blog')" class="form-control js-translatable" data-lang="{{$lang}}"
                                 @if($blog->translate($lang))value="{{$blog->translate($lang)->title}}"@endif>
                      @else
                          <input type="text" name="{{$lang}}_title" placeholder="@lang('Titulo del Blog')" class="form-control d-none js-translatable"  data-lang="{{$lang}}"
                                 @if($blog->translate($lang))value="{{$blog->translate($lang)->title}}"@endif>
                      @endif
                  @endforeach
              </div>
              <div class="form-group">
                  <label><b>@lang('Descripción')</b></label>
                  @foreach($languages as $lang)
                      @if($loop->first)
                          <textarea name="{{$lang}}_description" class="form-control js-translatable" rows="2" style="resize:none;" data-lang="{{$lang}}" >@if($blog->translate($lang)){{$blog->translate($lang)->description}}@endif</textarea>
                      @else
                          <textarea name="{{$lang}}_description" class="form-control d-none js-translatable" rows="2" style="resize:none;" data-lang="{{$lang}}">@if($blog->translate($lang)){{$blog->translate($lang)->description}}@endif</textarea>
                      @endif
                  @endforeach
              </div>
              <div class="form-group">
                  <label><b>@lang('Contenido')</b></label>
                  @foreach($languages as $lang)
                      @if($loop->first)
                          <textarea name="{{$lang}}_content" class="form-control content js-translatable js-rich-text" rows="10"  data-lang="{{$lang}}">@if($blog->translate($lang)){{$blog->translate($lang)->content}}@endif</textarea>
                      @else
                          <textarea name="{{$lang}}_content" class="form-control content d-none js-translatable js-rich-text" rows="10"  data-lang="{{$lang}}">@if($blog->translate($lang)){{$blog->translate($lang)->content}}@endif</textarea>
                      @endif
                  @endforeach
              </div>
          </div>
          <br>
          <center><button class="btn btn-success dim" type="submit"><i class="fa fa-check"></i> Guardar cambios</button></center>
        </div>
        <div class="col-md-4">
          <div class="ibox">
          <div class="ibox-title">
              <h5>OPCIONES</h5>
              <div class="ibox-tools">
              </div>
          </div>

          <div class="ibox-content">
            <div class="form-group"><label><b>Categorías</b></label>
              <select class="form-control js-select2" name="category[]" multiple>
                @foreach($categories as $category)
                  <option value="{{$category->id}}" @if($blog->hasCategory($category->id)) selected @endif>{{$category->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><b>Visible</b></label>
              <div class="custom-file col-lg-3">
                <input type="checkbox" class="i-checks" name="active" @if(old('active',$blog->active)) value="1" checked @endif>
              </div>
            </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label"><b>Recomendado</b></label>
                  <div class="custom-file col-lg-3">
                      <input type="checkbox" class="i-checks" name="featured" value="1" @if($blog->featured) checked @endif>
                  </div>
              </div>
            <div class="row">
              <label class="col-lg-4 col-form-label required"><b>Imagen Portada</b></label>
            </div>
            <div class="row ml-2" id="image"">
              <img src="{{$blog->Image()}}" style="max-width:250px;">
            </div>
            <br>
            <div class="row">
              <div class="custom-file col-lg-8 ml-2">
                  <input id="logo" type="file" class="custom-file-input js-image-input" name="image" accept="image/png, image/jpg, image/jpeg">
                  <label for="logo" class="custom-file-label js-image-label">Elegir nueva imagen...</label>
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
                          @foreach($languages as $lang)
                              <select name="{{$lang}}_keywords[]" class="form-control js-select2-keywords  @if(!$loop->first) d-none @endif js-translatable" data-lang="{{$lang}}" multiple>
                                  @if(isset($blog) && $blog->translate($lang))
                                      @foreach(Helper::getKeywords($blog, $lang) as $keyword)
                                          <option value="{{$keyword}}" selected>{{$keyword}}</option>
                                      @endforeach
                                  @endisset
                              </select>
                          @endforeach
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                          <label class="font-bold">Título SEO</label>
                          @foreach($languages as $lang)
                              <input type="text" name="{{$lang}}_title_seo" class="form-control @if(!$loop->first) d-none @endif js-translatable" data-lang="{{$lang}}"
                                     value="{{old($lang.'_title_seo', (isset($blog) && $blog->translate($lang)) ? $blog->translate($lang)->title_seo : null)}}">
                          @endforeach
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                          <label class="font-bold">Descripción SEO</label>
                          @foreach($languages as $lang)
                              <textarea name="{{$lang}}_description_seo" class="form-control @if(!$loop->first) d-none @endif js-translatable"
                                        data-lang="{{$lang}}">{{old($lang.'_description_seo', (isset($blog) && $blog->translate($lang)) ? $blog->translate($lang)->description_seo : null)}}</textarea>
                          @endforeach
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
        toggleLanguageInputs();
        toggleKeywordsInput();
        $('.js-select2').select2();
    });
</script>
@stop
