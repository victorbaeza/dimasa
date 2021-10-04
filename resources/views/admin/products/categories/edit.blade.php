@extends('layouts.admin.main')
{{-- css --}}
@section('extracss')
@stop

{{-- Content --}}
@section('content')


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Crear nueva Categoría de Producto</h2>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">

  <form method="POST" action="{{ route('admin.products.categories.do_edit') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $category->id }}" />

    <div class="row">
      <div class="col-lg-6">
        <div class="ibox">
          <div class="ibox-title">
            <h5>Detalles</h5>
          </div>
          <div class="ibox-content">

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Nombre <font color="red">*</font></label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Descripción</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="description" value="{{ $category->description }}">
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Categoría padre </label>
              <div class="col-lg-8">
                <div class="input-group">
                  <select class="form-control" name="parent_id">
                    <option></option>
                    @foreach (ProductCategory::all() as $parent_category)
                      <option value="{{ $parent_category->id }}" @if($parent_category->id==$category->parent_id) selected @endif>{{ $parent_category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>


          </div>
        </div>


        <div class="ibox">
          <div class="ibox-content">
            <div class="text-center">
              <a href="{{ route('admin.products.categories.list') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Atrás</a>
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
  </script>
@stop
