@extends('layouts.admin.main')

{{-- Extra CSS --}}
@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop
{{-- Content --}}
@section('content')

  <div class="wrapper wrapper-content animated fadeInRight">
      <form method="POST" action="{{ route('admin.products.do_edit', $product->id) }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="num_rates" id="num_rates" value="0" />
          <input type="hidden" name="num_subproducts" id="num_subproducts" value="0" />

          <div class="row">
              <div class="col-md-8">

                <div class="row">
                  <div class="col-md-12 col-12">

                <div class="ibox">
                  <div class="ibox-title">
                      <h3>Editar Producto - {{ $product->name }}</h3>
                      <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                      </div>
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
                                <option value="0">Particular</option>
                                <option value="1" @if($product->enterprise) selected @endif>Empresarial</option>
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
                                  <label><b>IVA<span class="text-danger">*</span></b></label>
                                  <input type="number" step=".01" min="0.00" name="VAT" class="form-control" required value="{{old('VAT', (isset($product) ? $product->VAT : '0.21'))}}">
                              </div>

                              <div class="col-3">
                                <label><b>Peso del producto (g)<span class="text-danger">*</span></b></label>
                                <input type="number" step=".01" min="0.00" name="weight" class="form-control" required value="{{old('weight', (isset($product) ? $product->weight : '0.00'))}}">
                              </div>

                          </div>
                      </div>

                      <div class="ibox border-bottom">
                        <div class="ibox-title">
                            <h5>Descripción larga</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                          @foreach($languages as $lang)
                              <textarea type="text" name="{{$lang}}_long_description" class="form-control @if(!$loop->first) d-none @endif js-translatable js-rich-text"
                                        data-lang="{{$lang}}">{{old($lang.'_long_description', (isset($product) && $product->translate($lang)) ? $product->translate($lang)->long_description : null)}}</textarea>
                          @endforeach
                        </div>
                      </div>

                      {{-- <div class="form-group">
                          <label><b>Descripción Larga</b></label>
                          @foreach($languages as $lang)
                              <textarea type="text" name="{{$lang}}_long_description" class="form-control @if(!$loop->first) d-none @endif js-translatable js-rich-text"
                                        data-lang="{{$lang}}">{{old($lang.'_long_description', (isset($product) && $product->translate($lang)) ? $product->translate($lang)->long_description : null)}}</textarea>
                          @endforeach
                      </div> --}}

                      <div class="ibox border-bottom">
                        <div class="ibox-title">
                            <h5>Ficha técnica</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" style="display: none;">
                          @foreach($languages as $lang)
                              <textarea type="text" name="{{$lang}}_data_sheet_text" class="form-control @if(!$loop->first) d-none @endif js-translatable js-rich-text"
                                        data-lang="{{$lang}}">{{old($lang.'_data_sheet_text', (isset($product) && $product->translate($lang)) ? $product->translate($lang)->data_sheet_text : null)}}</textarea>
                          @endforeach
                        </div>
                      </div>

                      <div class="ibox border-bottom">
                        <div class="ibox-title">
                            <h5>Tests</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" style="display: none;">
                          @foreach($languages as $lang)
                              <textarea type="text" name="{{$lang}}_tests_text" class="form-control @if(!$loop->first) d-none @endif js-translatable js-rich-text"
                                        data-lang="{{$lang}}">{{old($lang.'_tests_text', (isset($product) && $product->translate($lang)) ? $product->translate($lang)->tests_text : null)}}</textarea>
                          @endforeach
                        </div>
                      </div>

                      <div class="ibox border-bottom">
                        <div class="ibox-title">
                            <h5>Certificaciones</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" style="display: none;">
                          @foreach($languages as $lang)
                              <textarea type="text" name="{{$lang}}_certification_text" class="form-control @if(!$loop->first) d-none @endif js-translatable js-rich-text"
                                        data-lang="{{$lang}}">{{old($lang.'_certification_text', (isset($product) && $product->translate($lang)) ? $product->translate($lang)->certification_text : null)}}</textarea>
                          @endforeach
                        </div>
                      </div>


                  </div>
                </div>
              </div>
            </div>


            {{-- SUBPRODUCTOS --}}
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="ibox">
                  <div class="ibox-title">
                      <h4>SUBPRODUCTOS / VARIANTES</h4>
                      <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                      </div>
                  </div>

                  <div class="ibox-content">

                    {{-- <a href="{{ route('admin.products.edit.subproducts', ['id'=>$product->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Gestionar Subproductos</a> --}}
                    <a href="#" class="btn btn-info btn-xs" id="btn_add_subproduct"><i class="fa fa-plus-circle"></i> Añadir Subproducto</a>

                    <div class="table-responsive" style="margin-top:10px;">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Nombre <span class="text-danger">*</span></th>
                            <th>Precio <span class="text-danger">*</span></th>
                            <th>Peso (g) <span class="text-danger">*</span></th>
                            <th>Unidades en caja </th>
                          </tr>
                        </thead>
                        <tbody id="subproductosTable">

                          {{-- @foreach ($product->Children as $subproduct)
                            <tr>
                              <td>{{ $subproduct->name }}</td>
                              <td>{{ Helper::showPrice($subproduct->price) }}</td>
                              <td>{{ $subproduct->weight }}</td>
                              <td>{{ $subproduct->box_quantity }}</td>
                            </tr>
                          @endforeach --}}

                          @foreach ($product->Children as $subproduct)
                            <tr>
                              <td>
                                <input name="subproduct_name_{{$subproduct->id}}" type="text" class="form-control" value="{{ $subproduct->name }}" required>
                                {{-- @foreach ($languages as $lang)
                                  <input name="{{$lang}}_subproduct_name_{{$subproduct->id}}" type="text" class="form-control @if(!$loop->first) d-none @endif js-translatable js-rich-text" data-lang="{{$lang}}"
                                    value="{{ old($lang.'_subproduct_name_'.$subproduct->id, ($subproduct->translate($lang)) ? $subproduct->translate($lang)->name : null) }}">
                                @endforeach --}}
                              </td>
                              <td><input name="subproduct_price_{{$subproduct->id}}" type="number" step="0.01" class="form-control" value="{{ $subproduct->price }}" required></td>
                              <td><input name="subproduct_weight_{{$subproduct->id}}" type="number" min="0" step="0.01" class="form-control" value="{{ $subproduct->weight }}"></td>
                              <td><input name="subproduct_box_quantity_{{$subproduct->id}}" type="number" min="0" step="1" class="form-control" value="{{ $subproduct->box_quantity }}"></td>
                              <td>
                                <a href="{{ route('admin.products.edit.subproducts.do_delete', ['id'=>$product->id, 'subproduct_id'=>$subproduct->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                              </td>
                            </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            {{-- TARIFAS --}}
            {{-- <div class="row">
              <div class="col-md-12 col-12">
                <div class="ibox">
                  <div class="ibox-title">
                      <h4>TARIFAS</h4>
                      <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                      </div>
                  </div>

                  <div class="ibox-content">

                    <a href="#" class="btn btn-primary btn-xs" id="btn_add_rate"><i class="fa fa-plus-circle"></i> Añadir Tarifa</a>

                    <div class="table-responsive" style="margin-top:10px;">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Cantidad mínima <span class="text-danger">*</span></th>
                            <th>Cantidad máxima</th>
                            <th>Precio unitario <span class="text-danger">*</span></th>
                          </tr>
                        </thead>
                        <tbody id="tarifasTable">

                          @foreach ($product->Rates as $rate)
                            <tr>
                              <td><input name="min_quantity_{{$rate->id}}" type="number" min="2" step="1" class="form-control" value="{{ $rate->min_quantity }}" required></td>
                              <td><input name="max_quantity_{{$rate->id}}" type="number" step="1" class="form-control" value="{{ $rate->max_quantity }}"></td>
                              <td><input name="unit_price_{{$rate->id}}" type="number" min="0" step="0.01" class="form-control input-sm" value="{{ $rate->unit_price }}" required></td>
                              <td><a href="{{ route('admin.products.edit.rates.do_delete', ['id'=>$product->id, 'rate_id'=>$rate->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}


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
                                          <li id="li_photo_{{$photo->id}}">{{$photo->path}} <a href="#" class="btn btn-xs btn-danger btn_eliminar_imagen" data-id="{{$photo->id}}"><i class="fa fa-trash"></i></a></li>
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

        var num_rates = 0;
        $(document).on('click', '#btn_add_rate', function(e){
          e.preventDefault();
          num_rates++;
          var html = '<tr>';
          html += '<td><input name="add_rate_min_'+num_rates+'" type="number" min="2" step="1" class="form-control" placeholder="A partir de esta cantidad se aplica la tarifa"></td>';
          html += '<td><input name="add_rate_max_'+num_rates+'" type="number" step="1" class="form-control input-sm" placeholder="Hasta esta cantidad se aplica la tarifa"></td>';
          html += '<td><input name="add_rate_price_'+num_rates+'" type="number" min="0" step="0.01" class="form-control input-sm" placeholder="Precio de la tarifa por unidad de producto"></td>';
          html += '</tr>';
          $(html).appendTo('#tarifasTable');
          $('#num_rates').val(num_rates);
        })


        var num_subproducts = 0;
        $(document).on('click', '#btn_add_subproduct', function(e){
          e.preventDefault();
          num_subproducts++;
          var html = '<tr>';
          html += '<td><input name="add_subproduct_name_'+num_subproducts+'" type="text" class="form-control"></td>';
          html += '<td><input name="add_subproduct_price_'+num_subproducts+'" type="number" min="0" step="0.01" class="form-control"></td>';
          html += '<td><input name="add_subproduct_weight_'+num_subproducts+'" type="number" min="0" step="0.01" class="form-control input-sm"></td>';
          html += '<td><input name="add_subproduct_box_quantity_'+num_subproducts+'" type="number" min="0" step="0.01" class="form-control input-sm"></td>';
          html += '</tr>';
          $(html).appendTo('#subproductosTable');
          $('#num_subproducts').val(num_subproducts);
        })


        $(document).on('click', '.btn_eliminar_imagen', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var product = {{ $product->id }};
            var data = {
              id: id,
              product_id: product
            };
            $.ajax({
             type: "POST",
             url: "/ajax/products/edit/delete_photo",
             data: data,
             dataType: "json",
             encode: true,
             success: function(data){
               alert('La imagen ha sido eliminada correctamente!');
               $('#li_photo_'+id).remove();
             }
           });
        })

    </script>
@endsection
