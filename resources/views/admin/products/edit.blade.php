@extends('layouts.admin.main')
{{-- css --}}
@section('extracss')
@stop

{{-- Content --}}
@section('content')


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Editar Producto - {{ $product->name }}</h2>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">

  <form method="POST" action="{{ route('admin.products.do_edit') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}" />

    <div class="row">
      <div class="col-lg-6">
        <div class="ibox">
          <div class="ibox-title">
            <h5>Datos generales</h5>
          </div>
          <div class="ibox-content">

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Nombre <font color="red">*</font></label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="name" placeholder="Nombre completo" value="{{ $product->name }}" required>
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Categoría</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <select class="form-control" name="category_id">
                    @foreach (ProductCategory::all() as $category)
                      <option value="{{ $category->id }}" @if($product->category_id==$category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Marca</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <select class="form-control" name="brand_id">
                    @foreach (ProductBrand::all() as $brand)
                      <option value="{{ $brand->id }}" @if($product->brand_id==$brand->id) selected @endif>{{ $brand->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Precio de compra <font color="red">*</font></label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="number" class="form-control" name="buy_price" min="0" step="0.01" value="{{ $product->buy_price }}" required>
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Precio de comparación</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="number" class="form-control" name="price_comparison" min="0" step="0.01" value="{{ $product->price_comparison }}">
                </div>
              </div>
            </div>
            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Precio de venta <font color="red">*</font></label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="number" class="form-control" name="price" min="0" step="0.01" value="{{ $product->price }}" required>
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">IVA <font color="red">*</font></label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="number" class="form-control" name="VAT" min="0" step="0.01" value="{{ $product->VAT }}" required>
                </div>
              </div>
            </div>


            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Stock</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="number" class="form-control" name="stock" step="1" value="{{ $product->stock }}">
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>


      <div class="col-lg-6">


        <div class="ibox">
          <div class="ibox-title">
            <h5>Otros datos</h5>
          </div>

          <div class="ibox-content">

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">SKU</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="sku" placeholder="Código SKU del producto" value="{{ $product->sku }}">
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Código EAN </label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="ean_code" placeholder="Código EAN/IBN del producto" value="{{ $product->ean_code }}">
                </div>
              </div>
            </div>

            <div class="form-group row justify-content-md-center mt-5">
              <div class="custom-file col-lg-10">
                  <input id="photo" type="file" class="custom-file-input" name="image" accept="image/png, image/jpg, image/jpeg">
                  <label for="photo" class="custom-file-label">Elegir foto...</label>
              </div>
            </div>

          </div>
        </div>


        <div class="ibox">
          <div class="ibox-content">
            <div class="text-center">
              <a href="{{ route('admin.products.list') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Atrás</a>
              <button class="btn btn-success" type="submit">Guardar cambios</button>
            </div>
          </div>
        </div>

      </div>

    </div>
  </form>
</div>


@stop
{{-- Scripts --}}
@section('scripts')
  <script>
    $(document).ready(function() {

    });

    // Adjuntos
    $('.custom-file-input').on('change', function() {
       let fileName = $(this).val().split('\\').pop();
       $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
  </script>
@stop
