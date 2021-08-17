@extends('layouts.admin.main')

{{-- css --}}
@section('extracss')
@stop

{{-- Content --}}
@section('content')

      <form method="POST" action="/admin/clients/create" enctype="multipart/form-data">
        @csrf


      <div class="wrapper wrapper-content animated fadeInRight blog">
        <div class="row">
          <div class="col-md-6">
            <div class="ibox-title">
                <h5>CREAR CLIENTE NUEVO</h5>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="ibox-content">
                    <br>

                    <div class="form-group row"><label class="col-lg-4 col-form-label">Nombre <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="name" placeholder="Nombre del cliente" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group row"><label class="col-lg-4 col-form-label">Apellidos <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="surname" placeholder="Apellidos del cliente" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group row"><label class="col-lg-4 col-form-label">Email <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                          <input type="email" class="form-control" name="email" placeholder="Email de acceso al área de clientes" required>
                        </div>
                    </div>

                    <div class="form-group row"><label class="col-lg-4 col-form-label">Teléfono </label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="phone">
                        </div>
                    </div>

                    {{-- <div class="form-group row"><label class="col-lg-4 col-form-label">Activo</label>
                        <div class="col-lg-8">
                          <input type="checkbox" class="i-checks form-check-input custom-checkbox" name="active" checked>
                        </div>
                    </div> --}}

                    <div class="form-group row"><label class="col-lg-4 col-form-label">Cliente profesional</label>
                        <div class="col-lg-4">
                          <select class="form-control" name="professional" id="professional">
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group row d-none" data-commercial-block>
                        <label class="col-lg-4 col-sm-4 col-form-label">Comercial Asignado</label>
                        <div class="col-lg-6">
                          <select name="commercial_id" class="form-control">
                              @foreach($commercials as $commercial)
                                  <option value="{{$commercial->id}}">{{$commercial->name}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row"><label class="col-lg-4 col-form-label">Contraseña <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                          <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <div class="form-group row"><label class="col-lg-4 col-form-label">Confirmar contraseña <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                          <input type="password" class="form-control" name="repeatPassword" required>
                        </div>
                    </div>

            </div>
            <br>
            <center><button class="btn btn-success dim" type="submit"><i class="fa fa-check"></i> Guardar Cambios</button></center>
          </div>



          <div class="col-md-6">
            <div class="ibox">
            <div class="ibox-title">
                <h5>DETALLES DE FACTURACIÓN</h5>
                <div class="ibox-tools">
                </div>
            </div>

            <div class="ibox-content">

              <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><label class="col-form-label">CIF</label></td>
                      <td><input name="dni" type="text" class="form-control input-sm"></td>
                    </tr>
                    <tr>
                      <td><label class="col-form-label">Dirección</label></td>
                      <td><input type="text" class="form-control" name="address" placeholder="Direccion de facturación"></td>
                    </tr>
                    <tr>
                      <td><label class="col-form-label">Ciudad</label></td>
                      <td><input type="text" class="form-control" name="city"></td>
                    </tr>
                    <tr>
                      <td><label class="col-form-label">Código postal</label></td>
                      <td><input type="text" class="form-control" name="postal_code"></td>
                    </tr>
                    <tr>
                      <td><label class="col-form-label">Provincia</label></td>
                      <td><input type="text" class="form-control" name="province"></td>
                    </tr>
                    <tr>
                      <td><label class="col-form-label">País</label></td>
                      <td><input type="text" class="form-control" name="country" value="España" disabled></td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>


          <div class="ibox">
          <div class="ibox-title">
              <h5>DIRECCIÓN DE ENVÍO</h5>
              <div class="ibox-tools">
              </div>
          </div>
          <div class="ibox-content">

            <div class="table-responsive">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td><label class="col-form-label">Dirección</label></td>
                    <td><input type="text" class="form-control" name="shipping_address" placeholder="Direccion de envío"></td>
                  </tr>
                  <tr>
                    <td><label class="col-form-label">Ciudad</label></td>
                    <td><input type="text" class="form-control" name="shipping_city"></td>
                  </tr>
                  <tr>
                    <td><label class="col-form-label">Código postal</label></td>
                    <td><input type="text" class="form-control" name="shipping_postal_code"></td>
                  </tr>
                  <tr>
                    <td><label class="col-form-label">Provincia</label></td>
                    <td><input type="text" class="form-control" name="shipping_province"></td>
                  </tr>
                  <tr>
                    <td><label class="col-form-label">País</label></td>
                    <td><input type="text" class="form-control" name="shipping_country" value="España" disabled></td>
                  </tr>
                </tbody>
              </table>
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

          $('#professional').on('change', function(){
              if(this.value === "1")
                  $('[data-commercial-block]').removeClass('d-none');
              else
                  $('[data-commercial-block]').addClass('d-none');
          })

      });
  </script>
@stop
