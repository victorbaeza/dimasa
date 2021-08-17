@extends('layouts.admin.main')

{{-- Extra CSS --}}
@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop
{{-- Content --}}
@section('content')

  <div class="wrapper wrapper-content animated fadeInRight">
      <form method="POST" action="{{ route('admin.products.do_create') }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
              <div class="col-md-8">
                  <div class="ibox-title">
                      <h2>Crear Producto Nuevo</h2>
                      <div class="ibox-tools"></div>
                  </div>
                  @include('shared.language_selector')
                  <div class="ibox-content">
                      <div class="form-group">
                          <label><b>Nombre<span class="text-danger">*</span></b></label>
                          @foreach($languages as $lang)
                              <input type="text" name="{{$lang}}_name" placeholder="Nombre del producto" class="form-control @if(!$loop->first) d-none @endif js-translatable" data-lang="{{$lang}}"
                                     value="{{old($lang.'_name', (isset($product) && $product->translate($lang)) ? $product->translate($lang)->name : null)}}">
                          @endforeach
                      </div>
                      <div class="form-group">
                          <label><b>Descripción<span class="text-danger">*</span></b></label>
                          @foreach($languages as $lang)
                              <textarea name="{{$lang}}_description" class="form-control @if(!$loop->first) d-none @endif js-translatable"
                                        data-lang="{{$lang}}">{{old($lang.'_description', (isset($product) && $product->translate($lang)) ? $product->translate($lang)->description : null)}}</textarea>
                          @endforeach
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-4">
                              <label><b>Unidades en caja</b></label>
                              <input type="number" step="1" min="0" name="box_quantity" class="form-control" value="{{old('box_quantity', (isset($product) ? $product->box_quantity : null))}}">
                          </div>
                          <div class="col-4">
                              <label><b>Nombre del producto</b></label>
                              @foreach($languages as $lang)
                                <input type="text" name="{{$lang}}_unit_name" class="form-control @if(!$loop->first) d-none @endif js-translatable" data-lang="{{$lang}}"
                                  value="{{old($lang.'_unit_name', (isset($product) && $product->translate($lang)) ? $product->translate($lang)->unit_name : null)}}">
                              @endforeach
                          </div>
                          <div class="col-4">
                              <label><b>Tipo de producto</b></label>
                              <select class="form-control" name="enterprise" id="type_product">
                                <option value="0" selected>Particular</option>
                                <option value="1">Empresarial</option>
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                              <div class="col-3">
                                  <label><b>Precio (con IVA)<span class="text-danger">*</span></b></label>
                                  <input type="number" step=".01" min="0.00" name="price" class="form-control" required value="{{old('price', (isset($product) ? $product->price : null))}}">
                              </div>

                              <div class="col-3">
                                  <label><b>IVA <span class="text-danger">*</span></b></label>
                                  <input type="number" step=".01" min="0.00" name="VAT" class="form-control" required value="{{old('VAT', (isset($product) ? $product->VAT : '0.21'))}}">
                              </div>

                              <div class="col-3">
                                <label><b>Peso del producto (g)<span class="text-danger">*</span></b></label>
                                <input type="number" step=".01" min="0.00" name="weight" class="form-control" required value="{{old('weight', (isset($product) ? $product->weight : '0.00'))}}">
                              </div>

                              <div class="col-3">
                                  <label><b>Unidades en caja</b></label>
                                  <input type="number" step="1" min="0" name="box_quantity" class="form-control" value="{{old('box_quantity', (isset($product) ? $product->box_quantity : null))}}">
                              </div>

                          </div>
                      </div>
                      <div class="form-group">
                          <label><b>Descripción Larga</b></label>
                          @foreach($languages as $lang)
                              <textarea type="text" name="{{$lang}}_long_description" class="form-control @if(!$loop->first) d-none @endif js-translatable js-rich-text"
                                        data-lang="{{$lang}}">{{old($lang.'_long_description', (isset($product) && $product->translate($lang)) ? $product->translate($lang)->long_description : null)}}</textarea>
                          @endforeach
                      </div>
                  </div>
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
                              <select class="form-control js-select2" name="category" required>
                                  <option></option>
                                  @foreach($categories as $category)
                                      <option value="{{$category->id}}" @if(isset($product) && $product->category_id === $category->id) selected @endif>{{$category->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="row">
                              <label class="col-lg-4 col-form-label required"><b>Imagen Principal</b></label>
                          </div>
                          @isset($product)
                              <div class="row ml-2">
                                  <img class="img-thumbnail" src="{{asset($product->getPhotoPrincipal())}}">
                              </div>
                          @endisset
                          <div class="row mt-3">
                              <div class="custom-file col-lg-10 ml-2">
                                  <input id="photo_principal" type="file" class="custom-file-input js-image-input" name="photo_principal" accept="image/png, image/jpg, image/jpeg">
                                  <label for="photo_principal" class="custom-file-label js-image-label">Elegir nueva imagen principal...</label>
                              </div>
                          </div>

                          <div class="row mt-3">
                              <label class="col-lg-4 col-form-label"><b>Imagenes</b></label>
                          </div>
                          @isset($product)
                              <div class="row ml-2">
                                  <ul>
                                      @foreach($product->Photos as $photo)
                                          <li>{{$photo->path}}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endisset
                          <div class="row mt-3">
                              <div class="custom-file col-lg-10 ml-2">
                                  <input id="logo" type="file" class="custom-file-input js-image-input" name="photos[]" accept="image/png, image/jpg, image/jpeg" multiple>
                                  <label for="logo" class="custom-file-label js-image-label">Elegir nuevas imagenes...</label>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <label class="col-lg-4 col-form-label"><b>Archivos</b></label>
                          </div>
                          @isset($product)
                              <div class="row ml-2" id="attachments">
                                  <div class="row ml-2">
                                      <ul>
                                          @foreach($product->Files as $file)
                                              <li>{{$file->path}}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              </div>
                          @endisset
                          <div class="row">
                              <div class="custom-file col-lg-10 ml-2">
                                  <input type="file" class="custom-file-input js-image-input" name="files[]" accept="image/png, image/jpg, image/jpeg" multiple>
                                  <label class="custom-file-label js-image-label">Elegir nuevos archivos...</label>
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
                                              @if(isset($product) && $product->translate($lang))
                                                  @foreach(Helper::getKeywords($product, $lang) as $keyword)
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
                                                 value="{{old($lang.'_title_seo', (isset($product) && $product->translate($lang)) ? $product->translate($lang)->title_seo : null)}}">
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
                                                    data-lang="{{$lang}}">{{old($lang.'_description_seo', (isset($product) && $product->translate($lang)) ? $product->translate($lang)->description_seo : null)}}</textarea>
                                      @endforeach
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col">
                  <div class="text-center">
                      <button class="btn btn-success dim" type="submit"><i class="fa fa-check"></i>@isset($product) Guardar cambios @else Crear Producto @endisset</button>
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
      </form>
  </div>
@stop
{{-- Scripts --}}
@section('scripts')
    <script src="/vendor/js/plugins/tinymce/tinymce.min.js"></script>
    <script src="/vendor/select2-4.0.6/js/select2.js"></script>
    <script>
        $(function(){
            limitImageSize();
            toggleLanguageInputs(true, true);
            $('.js-select2').select2({
                placeholder: 'Categoría producto'
            });

            toggleKeywordsInput();
        })
    </script>
@endsection
