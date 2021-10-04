@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox-content">
                <div class="form-group row"><label class="col-lg-4 col-form-label">Nombre <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="name" placeholder="Nombre del cliente" required @if(isset($client)) value="{{$client->name}}" @endif>
                    </div>
                </div>
                <div class="form-group row"><label class="col-lg-4 col-form-label">Apellidos <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="surname" placeholder="Apellido del cliente" required  @if(isset($client)) value="{{$client->surname}}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Email <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="email" class="form-control" name="email" placeholder="Email del cliente" required  @if(isset($client)) value="{{$client->email}}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-5 form-check-label"><b>Activo</b></label>
                    <div class="col-lg-2">
                      <input type="checkbox" class="i-checks form-check-input custom-checkbox" name="active" @if(!isset($client) || $client->active) checked @endif>
                    </div>
                </div>

                <hr>
                @isset($client)
                    <button  type="button" data-toggle="collapse" data-target="#passwordZone" class="btn btn-primary">Modificar contraseña</button>
                    <div class="collapse" id="passwordZone">
                        <div class="form-group row" >
                            <label class="col-lg-4 col-form-label">Contraseña <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Confirmar contraseña <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="repeatPassword">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Contraseña <span class="text-danger">*</span></label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Confirmar contraseña <span class="text-danger">*</span></label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" name="repeatPassword">
                        </div>
                    </div>
                @endif

            </div>
        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">DNI</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="dni" placeholder="DNI"  @if(isset($client)) value="{{$client->dni}}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Dirección</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="address" placeholder="Direccion"  @if(isset($client)) value="{{$client->address}}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Ciudad</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="city" placeholder="Ciudad"  @if(isset($client)) value="{{$client->city}}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Código Postal</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="postal_code" placeholder="00000"  @if(isset($client)) value="{{$client->postal_code}}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Provincia</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="province" placeholder="Provincia"  @if(isset($client)) value="{{$client->province}}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">País</label>
                    <div class="col-lg-6">
                        <select name="country_id" id="country">
                            @foreach($countries as $country)
                                <option value="{{$country->id}}"  @if(isset($client) && $country->id == $client->country_id) selected @endif>{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Teléfono</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="phone" placeholder="600000000"  @if(isset($client)) value="{{$client->phone}}" @endif>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-4 form-check-label"><b>Cliente profesional</b></label>
                    <div class="col-lg-2">
                      <select class="form-control" name="professional" id="professional">
                        <option value="0">No</option>
                        <option value="1" @if(isset($client) && $client->professional) selected @endif>Sí</option>
                      </select>
                    </div>
                </div>
                <div class="form-group row @if(!isset($client) || empty($client->commercial_id)) d-none @endif" data-commercial-block>
                    <label class="col-lg-4 col-sm-4 col-form-label">Comercial Asignado</label>
                    <div class="col-lg-6">
                      <select name="commercial_id" class="form-control">
                          @foreach($commercials as $commercial)
                              <option value="{{$commercial->id}}" @if(isset($client) && $commercial->id == $client->commercial_id) selected @endif>{{$commercial->name}}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-5">
        <div class="col-4 offset-4">

            <div class="row">
                <div class="col">
                    <button class="btn btn-block btn-lg btn-primary" type="submit"> @if(isset($client)) Guardar cambios @else Crear Cliente @endif</button>
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

            $('#country').select2({
                placeholder: 'pais',
                allowClear: true
            })
        });
    </script>
@endsection
