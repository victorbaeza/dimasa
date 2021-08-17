@extends('layouts.admin.main')

{{-- css --}}
@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop

{{-- Content --}}
@section('content')

  <form method="POST" action="{{route('admin.blog.category.do_create')}}">
  @csrf

  <div class="row">
      <div class="col-lg-12">
          <div class="ibox ">
              <div class="ibox-title">
                  <h5>Nueva Categoría Blog </h5>
              </div>
              @include('shared.language_selector')
              <div class="ibox-content">
                  <div class="row">
                      <div class="col-xs-12 col-md-6">
                          <div class="form-group">
                              <label class="required font-bold">Nombre</label>
                              @foreach($languages as $lang)
                                  @if($loop->first)
                                      <input type="text" name="{{$lang}}_name" placeholder="Nombre de la categoría" class="form-control js-translatable"  data-lang="{{$lang}}">
                                  @else
                                      <input type="text" name="{{$lang}}_name" placeholder="Nombre de la categoría" class="form-control d-none js-translatable"  data-lang="{{$lang}}">
                                  @endif
                              @endforeach
                          </div>
                      </div>
                      <div class="col-xs-12 col-md-6">
                          <div class="row">
                              <div class="col-12">
                                  <div class="form-group">
                                      <label class="font-bold">Keywords</label>
                                      @foreach($languages as $lang)
                                          <select name="{{$lang}}_keywords[]" class="form-control js-select2-keywords  @if(!$loop->first) d-none @endif js-translatable" data-lang="{{$lang}}" multiple>
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
                                                 value="{{old($lang.'_title_seo')}}">
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
                                                    data-lang="{{$lang}}">{{old($lang.'_description_seo')}}</textarea>
                                      @endforeach
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-4 col-sm-offset-2">
                      <button class="btn btn-primary btn-sm" type="submit">Guardar Cambios</button>
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
            toggleLanguageInputs(false);
            toggleKeywordsInput();
        });
    </script>
@stop
