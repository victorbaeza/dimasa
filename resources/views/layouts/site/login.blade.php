<div class="login-popup mfp-hide" id="login-modal">
    <div class="form-box">
        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
            <ul class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-5" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active border-no lh-1 ls-normal" href="#signin">Iniciar sesión</a>
                </li>
                <li class="delimiter">|</li>
                <li class="nav-item">
                    <a class="nav-link border-no lh-1 ls-normal" href="#register">Registrarse</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="signin">
                  <div class="mb-2 text-center">
                  <span class="lost-link ">¿No tienes cuenta? <a class="register-link" href="#">Haz click aquí para crear una</a></span>
                </div>
                @if($message = Session::get("login_error"))<div class="mb-2 alert alert-danger text-white" style="font-size: 1.2rem;">{{$message}}</div>@endif
                  @if($message = Session::get("register_success"))<div class="mb-2 alert alert-success text-white" style="font-size: 1.2rem;">{{$message}}</div>@endif
                    <form action="#" method="POST">
                      @csrf
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" id="singin-email" name="signin-email" placeholder="Email *" required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="singin-password" name="signin-password" placeholder="Contraseña *"
                                required />
                        </div>
                        <div class="form-footer">
                            <div class="form-checkbox">
                                <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                    name="signin-remember" />
                                <label class="form-control-label" for="signin-remember">Recordarme</label>
                            </div>
                            <span class="lost-link"><a href="#" >Recuperar contraseña</a></span>
                        </div>
                        <button class="btn btn-primary btn-outline btn-block" type="submit">INICIAR SESIÓN</button>
                    </form>
                </div>
                <div class="tab-pane" id="register">
                  <div class="mb-2 text-center">
                    <span class="lost-link ">¿Ya tienes cuenta? <a class="login-link" href="#">Haz click aquí para iniciar sesión</a></span>
                  </div>
                  @if($message = Session::get("register_error"))<span class="text-danger mb-2" style="font-size: 1.2rem;">{{$message}}</span>@endif
                    <form action="" method="POST">
                      @csrf
                        <div class="form-group mb-3">
                          @error('register-name')<span class="text-danger mb-2">El nombre es obligatorio</span>@enderror
                            <input type="text" value="{{old('register-name')}}" class="form-control" id="register-name" name="register-name" placeholder="Nombre *" required />
                        </div>
                        <div class="form-group mb-3">
                          @error('register-surname')<span class="text-danger mb-2">Los apellidos son obligatorios</span>@enderror
                            <input type="text" value="{{old('register-surname')}}" class="form-control" id="register-surname" name="register-surname" placeholder="Apellidos *" required />
                        </div>
                        <div class="form-group mb-3">
                          @error('register-dni')<span class="text-danger mb-2">Debes introducir un formato de documento de identidad válido</span>@enderror
                            <input type="text" value="{{old('register-dni')}}" class="form-control" id="register-dni" name="register-dni" placeholder="D.N.I. o C.I.F" />
                            <span class="font-size-1">* Campo opcional, necesario para incluir documento en la facturación</span>
                        </div>
                        <div class="form-group mb-3">
                          @error('register-email')<span class="text-danger mb-2">El email es obligatorio</span>@enderror
                            <input type="email" value="{{old('register-email')}}" class="form-control" id="register-email" name="register-email" placeholder="Dirección de correo electrónico *"
                                required />
                        </div>
                        <div class="form-group mb-3">
                          @error('register-email')<span class="text-danger mb-2">El campo teléfono debe estar formado por números</span>@enderror
                            <input type="text" value="{{old('register-phone')}}" class="form-control" id="register-phone" name="register-phone" placeholder="Número de teléfono *" />
                        </div>
                        @error('register-password')<span class="text-danger mb-2 font-size-1">Las contraseñas deben coincidir. La contraseña debe contener al menos 6 caracteres formados por al menos una minúscula, una mayúscula, un número y un caracter especial entre ellos.</span>@enderror
                        <div class="form-group">
                            <input type="password" class="form-control" id="register-password" name="register-password" placeholder="Contraseña *"
                                required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="register-password-repeat" name="register-password-repeat" placeholder="Repetir contraseña *"
                                required />
                        </div>
                        <div class="form-footer">
                          @error('register-agree')<span class="text-danger mb-2">Debes aceptar la política de privacidad</span>@enderror
                            <div class="form-checkbox">
                                <input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree"
                                    required />
                                <label class="form-control-label" for="register-agree">He leído y acepto la <a href="#" target="_blank">política de privacidad</a></label>
                            </div>
                        </div>
                        <button class="btn btn-outline btn-primary btn-block" type="submit">REGISTRARSE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
