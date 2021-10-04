@extends('layouts.admin.main')
@php
@endphp

@section('content')
  <form method="POST" action="{{ route('admin.shipment.do_edit', ['id' => $shipment->id]) }}">
      @csrf
      <div class="row">
          <div class="col-lg-12">
              <div class="ibox">
                  <div class="ibox-title">
                      <h5> Editar método de envío</h5>
                  </div>

                  <div class="ibox-content">
                      <div class="form-group">
                          <label class="required font-weight-bold">Descripción</label>
                          <input type="text" name="description" class="form-control" value="{{ $shipment->description }}" required>
                      </div>
                      <div class="row">
                          <div class="col-2">
                              <div class="form-group">
                                  <label for="cost" class="required font-weight-bold">Precio</label>
                                  <input id="cost" type="number" step=".01" name="cost" class="form-control" min="0.00" required value="{{ $shipment->cost }}" required>
                              </div>
                          </div>
                          <div class="col-2">
                              <div class="form-group">
                                  <label for="minimum_free" class="font-weight-bold">Precio Mínimo Envío gratis (opcional)</label>
                                  <input id="minimum_free" type="number" step=".01" name="minimum_free" min="0.00" class="form-control" value="{{ $shipment->minimum_free }}">
                              </div>
                          </div>
                          <div class="col-5">
                              <div class="form-check">
                                  <input type="checkbox" class="i-checks form-check-input custom-checkbox" name="default" value="1" @if($shipment->default) checked @endif>
                                  <label class="form-check-label"><b>Envío por defecto</b></label>
                              </div>
                              <div class="form-check mt-3">
                                  <input type="checkbox" class="i-checks form-check-input custom-checkbox" name="active" value="1" @if($shipment->active) checked @endif>
                                  <label class="form-check-label"><b>Activo</b></label>
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
                  <button class="btn btn-success dim" type="submit"><i class="fa fa-check"></i> Guardar cambios</button>
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

@endsection

@section('scripts')
    <script>
        $(function () {
        })
    </script>
@endsection
