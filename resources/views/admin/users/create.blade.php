@extends('layouts.admin.main')

{{-- css --}}
@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop

{{-- Content --}}
@section('content')
  <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
          <h2>CREAR USUARIO NUEVO</h2>
      </div>
  </div>

  <form method="POST" action="{{route('admin.user.create')}}" enctype="multipart/form-data">
  @csrf
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-md-6">
        <div class="ibox-content">
                <div class="form-group row"><label class="col-lg-4 col-form-label">Usuario <font color="red">*</font></label>
                    <div class="col-lg-6"><input type="text" class="form-control" name="user" placeholder="Usuario de login" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label required">Tipo de Usuario</label>
                    <div class="col-lg-6">
                        <select class="w-75" id="role" name="type" required>
                            @foreach(UserType::all() as $type)
                                <option value="{{$type->id}}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row"><label class="col-lg-4 col-form-label">Nombre <font color="red">*</font></label>
                    <div class="col-lg-6"><input type="text" class="form-control" name="name" placeholder="Nombre del empleado" value="{{old('name')}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label required">Email</label>
                    <div class="col-lg-6">
                        <input type="email" class="form-control" name="email" placeholder="Email del empleado" value="{{old('email')}}" required>
                    </div>
                </div>

                <div class="form-group row"><label class="col-lg-4 col-form-label">Contraseña <font color="red">*</font></label>
                    <div class="col-lg-6"><input type="password" class="form-control" name="pwd" value="{{old('pwd')}}"></div>
                </div>

                <div class="form-group row"><label class="col-lg-4 col-form-label">Confirmar contraseña <font color="red">*</font></label>
                    <div class="col-lg-6"><input type="password" class="form-control" name="pwd2" value="{{old('pwd2')}}"></div>
                </div>

                <br>

                <div class="form-group row">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-success" type="submit">Crear Usuario</button>
                    </div>
                </div>

        </div>
      </div>
      <div class="col-md-6">
        <div class="ibox-content">

          <div class="form-group row"><label class="col-lg-4 col-form-label">Foto</label>
            <div class="custom-file col-lg-4">
                <input id="logo" type="file" class="custom-file-input js-image-input" name="picture" accept="image/png, image/jpg, image/jpeg">
                <label for="logo" class="custom-file-label js-image-label">Elegir foto...</label>
            </div>
          </div>

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
  </div>
</form>

@stop

{{-- Scripts --}}
@section('scripts')
    <script src="/vendor/select2-4.0.6/js/select2.js"></script>
    <script>
        $(function(){
           limitImageSize();
           $('#role').select2();
        });
    </script>
@stop
