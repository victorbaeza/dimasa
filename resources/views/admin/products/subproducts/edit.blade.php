@extends('layouts.admin.main')

{{-- Extra CSS --}}
@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop
{{-- Content --}}
@section('content')

  <div class="wrapper wrapper-content animated fadeInRight">
      <form method="POST" action="{{ route('admin.products.edit.subproducts.do_edit', $product->id) }}">
          @csrf
          <input type="hidden" name="num_subproducts" id="num_subproducts" value="0" />

          <div class="row">
              <div class="col-md-12">

                <div class="row">
                  <div class="col-md-12 col-12">

                <div class="ibox">
                  <div class="ibox-title">
                      <h3>Gestionar Subproductos - {{ $product->name }}</h3>
                      <div class="ibox-tools">
                      </div>
                  </div>
                  @include('shared.language_selector')
                  <div class="ibox-content">

                    <a href="#" class="btn btn-info btn-sm" id="btn_add_subproduct"><i class="fa fa-plus-circle"></i> Añadir Subproducto</a>

                    <div class="table-responsive" style="margin-top:10px;">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Nombre <span class="text-danger">*</span></th>
                            <th>Precio <span class="text-danger">*</span></th>
                            <th>Peso (g) <span class="text-danger">*</span></th>
                            <th>Unidades en caja </th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody id="subproductosTable">

                          @foreach ($product->Children as $subproduct)
                            <tr>
                              <td>
                                @foreach ($languages as $lang)
                                  <input name="{{$lang}}_subproduct_name_{{$subproduct->id}}" type="text" class="form-control @if(!$loop->first) d-none @endif js-translatable js-rich-text" data-lang="{{$lang}}"
                                    value="{{ old($lang.'_subproduct_name_'.$subproduct->id, ($subproduct->translate($lang)) ? $subproduct->translate($lang)->name : null) }}">
                                @endforeach
                              </td>
                              <td><input name="subproduct_price_{{$subproduct->id}}" type="number" step="0.01" class="form-control" value="{{ $subproduct->price }}"></td>
                              <td><input name="subproduct_weight_{{$subproduct->id}}" type="number" min="0" step="0.01" class="form-control" value="{{ $subproduct->weight }}"></td>
                              <td><input name="subproduct_box_quantity_{{$subproduct->id}}" type="number" min="0" step="1" class="form-control" value="{{ $subproduct->box_quantity }}"></td>
                              <td></td>
                            </tr>
                          @endforeach

                        </tbody>
                      </table>
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
                      <button class="btn btn-success dim" type="submit"><i class="fa fa-check"></i>Guardar cambios</button>
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

            toggleKeywordsInput();
        })

        var num_subproducts = 0;
        $(document).on('click', '#btn_add_subproduct', function(e){
          e.preventDefault();
          num_subproducts++;
          var html = '<tr>';
          html += '<td>@foreach ($languages as $lang)<input name="{{$lang}}_subproduct_name_" type="text" class="form-control @if(!$loop->first) d-none @endif js-translatable js-rich-text" data-lang="{{$lang}}">@endforeach</td>';
          html += '<td><input name="add_subproduct_price_'+num_subproducts+'" type="number" min="0" step="0.01" class="form-control"></td>';
          html += '<td><input name="add_subproduct_weight_'+num_subproducts+'" type="number" min="0" step="0.01" class="form-control input-sm"></td>';
          html += '<td><input name="add_subproduct_box_quantity_'+num_subproducts+'" type="number" min="0" step="0.01" class="form-control input-sm"></td>';
          html += '</tr>';
          $(html).appendTo('#subproductosTable');
          $('#num_subproducts').val(num_subproducts);
        })

    </script>
@endsection
