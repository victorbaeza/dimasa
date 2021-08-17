@extends('layouts.admin.main')

{{-- css --}}
@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop

{{-- Content --}}
@section('content')
  <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
          <h2>EDITAR USUARIO - {{$user->name}}</h2>
      </div>
  </div>

  <form method="POST" action="{{route('admin.user.do_edit')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{$user->id}}" />

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-md-6">
        <div class="ibox-content">

            <div class="form-group row"><label class="col-lg-4 col-form-label">Usuario <font color="red">*</font></label>
                <div class="col-lg-6"><input type="text" class="form-control" name="user" placeholder="Usuario de login" value="{{$user->user}}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label required">Tipo de Usuario</label>
                <div class="col-lg-6">
                    <select class="w-75" id="role" name="role" required>
                        @foreach(UserRole::values() as $role)
                            <option value="{{$role}}" @if($user->role == $role->getValue()) selected @endif>{{UserRole::getText($role)}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row"><label class="col-lg-4 col-form-label">Nombre <font color="red">*</font></label>
                <div class="col-lg-6"><input type="text" class="form-control" name="name" placeholder="Nombre del empleado" value="{{$user->name}}" required>
                </div>
            </div>

            <div class="form-group row"><label class="col-lg-4 col-form-label">Email <font color="red">*</font></label>
                <div class="col-lg-6"><input type="email" class="form-control" name="email" placeholder="Email del empleado" value="{{$user->email}}" required>
                </div>
            </div>

            <button type="button" data-toggle="collapse" data-target="#passwordZone" class="btn btn-primary">Modificar contraseña</button>
            <div class="collapse" id="passwordZone">
                <div class="form-group row" >
                    <label class="col-lg-4 col-form-label">Contraseña <font class="text-danger">*</font></label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" name="pwd">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Confirmar contraseña <font class="text-danger">*</font></label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" name="pwd2">
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="ibox-content">

          <div class="form-group row"><label class="col-lg-4 col-form-label">Foto</label>
            <br>
            @if($user->picture)
              <img src="/storage/usuarios/{{$user->picture}}" style="max-width:200px;">
            @endif
            <div class="custom-file col-lg-6">
                <input id="logo" type="file" class="custom-file-input js-image-input" name="picture" accept="image/png, image/jpg, image/jpeg">
                <label for="logo" class="custom-file-label js-image-label">Elegir foto...</label>
            </div>
          </div>

        </div>
      </div>
    </div>
      <div class="form-group row mt-5">
          <div class="offset-sm-4 col-sm-4 col-xs-12">
              <button class="btn btn-success btn-block" type="submit">Guardar cambios</button>
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
