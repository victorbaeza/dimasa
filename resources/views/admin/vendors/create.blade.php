@extends('layouts.admin.main')
{{-- css --}}
@section('extracss')
@stop

{{-- Content --}}
@section('content')


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Crear nuevo Proveedor</h2>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">

  <form method="POST" action="{{ route('admin.vendors.do_create') }}">
    @csrf

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
                  <input type="text" class="form-control" name="name" placeholder="Nombre completo" value="{{ old('name') }}" required>
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Empresa / Razón Social </label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Alias </label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="alias" value="{{ old('alias') }}">
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Web</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="website" value="{{ old('website') }}">
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">CIF/NIF</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="NIF" placeholder="DNI/CIF" value="{{ old('NIF') }}">
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Email</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Teléfono</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Persona de contacto</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="contact_name" value="{{ old('contact_name') }}">
                </div>
              </div>
            </div>


          </div>
        </div>


        <div class="ibox">

          <div class="ibox-title">
            <h5>Dirección</h5>
          </div>

          <div class="ibox-content">

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Dirección</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="address" placeholder="Calle, dirección, número" value="{{ old('address') }}">
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Ciudad</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Código Postal</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="zip" value="{{ old('zip') }}">
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Provincia</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="`province`" value="{{ old('`province`') }}">
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">País</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <input type="text" class="form-control" name="country" value="{{ old('country') }}">
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>


      <div class="col-lg-6">


        <div class="ibox">
          <div class="ibox-title">
            <h5>Otros Datos</h5>
          </div>

          <div class="ibox-content">

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Forma de Pago</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <select class="form-control" name="payment_form_id">
                    @foreach (PaymentForm::all() as $payment_form)
                      <option value="{{ $payment_form->id }}">{{ $payment_form->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group  row">
              <label class="col-lg-4 col-form-label">Observaciones</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <textarea class="form-control" name="observations" rows="3">{{ old('observations') }}</textarea>
                </div>
              </div>
            </div>

          </div>
        </div>


        <div class="ibox">
          <div class="ibox-content">
            <div class="text-center">
              <a href="{{ route('admin.vendors.list') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Atrás</a>
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
